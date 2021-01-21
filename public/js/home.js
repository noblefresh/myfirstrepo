$(document).ready(function(){
    var nf = new Intl.NumberFormat();
    // Product Search
    $('input[name=searchproduct]').on('keyup', function(){
        var list_of_products = '';
        $data = $('input[name=searchproduct]').val();
        // alert($data);
        $.ajax({
            type:'get',
            url:'/searchproduct',
            data:{data:$data},
            dataType:'json',
            success: function(response){
                response.foods.forEach(function(food_item){
                    list_of_products += `<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="ms-card">
                      <div class="ms-card-img">
                        <img src="/productImages/${food_item.image}" alt="card_img" class="w-100">
                      </div>
                      <div class="ms-card-body">
                        <div class="new">
                          <h6 class="mb-0">${food_item.name}</h6>
                          <h6 class="ms-text-primary mb-0">&#8358;${nf.format(food_item.amount)}</h6>
                        </div>
                        <div class="new meta">
                          <p>ID:${food_item.productid}</p>
                          <span class="badge badge-success">${food_item.menu.name}</span>
                        </div>
                        <div class="new mb-0">
                          <a type="button" class="btn grid-btn mt-0 btn-sm btn-primary" href="/deletefood/${food_item.id}">Remove</a>
                          <a type="button" class="btn grid-btn mt-0 btn-sm btn-secondary" href="/editfood/${food_item.id}">Edit</a>
                        </div>
                      </div>
                    </div>
                  </div>`;
                });

                $('#pro_list').html(list_of_products);
            },
            error: function(e,r,error){
                console.log(error);
            }
        });
    });

    // Order Search
    $('input[name=searchorder]').on('keyup', function(){
        var list_of_order = '';
        $data = $('input[name=searchorder]').val();
        // alert($data);
        $.ajax({
            type:'get',
            url:'/searchorder',
            data:{data:$data},
            dataType:'json',
            success: function(response){
                response.forEach(function(order){
                    list_of_order += `<tr>
                    <th scope="row">${order.orderid}</th>
                    <td>${order.product.name}</td>
                    <td>${order.customer.name}</td>
                    <td>${order.customer.address1}</td>
                    <td>
                        <span class="badge text-light ${order.status == 'processing' ? 'bg-danger' : order.status == 'delivered' ? 'bg-success' : 'bg-dark'}">
                            ${order.status}
                        </span>
                    </td>
                    <td>&#8358;${nf.format(order.product.amount)}</td>
                    <td><a href="/orderinvoice/${order.orderid}" class=""><i class="fas  fa-eye"></i></a></td>
                  </tr>`;
                })
                $('#order_items').html(list_of_order);
            },
            error: function(e,r,error){
                console.log(error);
            }
        });
    });
});