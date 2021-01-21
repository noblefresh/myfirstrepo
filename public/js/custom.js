$(document).ready(function(){
    // STAR RATING
    $star = 1;
    $('#star1').on('click',function(){
        $('#star1').css('color','#fcb71b');
        $star = 1;
    });
    $('#star2').on('click',function(){
        $('#star1').css('color','#fcb71b');
        $('#star2').css('color','#fcb71b');
        $star = 2;
    });
    $('#star3').on('click',function(){
        $('#star1').css('color','#fcb71b');
        $('#star2').css('color','#fcb71b');
        $('#star3').css('color','#fcb71b');
        $star = 3;
    });
    $('#star4').on('click',function(){
        $('#star1').css('color','#fcb71b');
        $('#star2').css('color','#fcb71b');
        $('#star3').css('color','#fcb71b');
        $('#star4').css('color','#fcb71b');
        $star = 4;
    });
    $('#star5').on('click',function(){
        $('#star1').css('color','#fcb71b');
        $('#star2').css('color','#fcb71b');
        $('#star3').css('color','#fcb71b');
        $('#star4').css('color','#fcb71b');
        $('#star5').css('color','#fcb71b');
        $star = 5;
    });

    $('form[name=frmRate]').on('submit', function (e) {
        e.preventDefault();

        $productid = $('input[name=productid]').val();
        $username = $('input[name=username]').val();
        $message = $('textarea[name=message]').val();

        $.ajax({
            type:'get',
            url:'/save_rating',
            data:{productid:$productid, username:$username, message:$message, star:$star},
            dataType:'json',
            success: function(res){
                if(res.status == 'success'){
                    $('#modalMsg').text("Thanks for rating");
                    $('#successModal').modal('show');
                    $('#message').val('');
                    $('#username').val('');
                }else{
                    $('#modalMsg').text("Network error! Try again later");
                    $('#errorModal').modal('show');
                }
                // console.log(res);
            },
            error: function(r,e,error){
                console.log(error);
            }
        });


    });
    function loadCart() {
        $.ajax({
            type: 'get',
            url : '/loadcartcontainer',
            dataType:'html',
            success: function (response) {
                $('.cart_container').html(response)
            }
        })
    }
    loadCart();

    function loadCartView() {
        $.ajax({
            type: 'get',
            url : '/loadcartview',
            dataType: 'html',
            success: function (response){
                $('#cart_view').html(response)
            }
        })
    }
    loadCartView();

    // ADD PRODUCT TO CART FUNCTION
    $('.addToCart').on('click', function(){
        $productid = $(this).attr('title')
        if($('#qty').length > 0){
            $qtyInput = $('#qty').val();
            add2cart($productid, $qtyInput)
        }else{
            add2cart($productid);
        }
    });

    function add2cart(id, qty = 1){
        $productid = id;
        $ip = $('#ip').val();
        $qty = qty == '' ? 1 : qty;
        $.ajax({
            type:'get',
            url:'/addtocart',
            data:{productid:$productid,ip:$ip, qty:$qty},
            dataType:'json',
            success: function(res){
                loadCart();
            },
            error: function(e,r,error){
                console.log(error);
            }
        });
    }

    // Delete item from cart
    $('#cart_container').on('click', '.delitem', function(){
        $id = $(this).attr('id');

        $.ajax({
            type:'get',
            url:'/delete_cart_item',
            data:{id:$id},
            success: function(res){
                loadCart();
            }
        });
    });

    // Delete item from cart (in View Page)
    $('#cart_view').on('click', '.delitem', function(){
        $id = $(this).attr('id');

        $.ajax({
            type:'get',
            url:'/delete_cart_item',
            data:{id:$id},
            success: function(res){
                loadCartView();
            }
        });
    });

    // Clear All Items in Cart
    $('.cart_container').on('click', '.clearCart', function(){
        $ip = $(this).attr('id');

        $.ajax({
            type:'get',
            url:'/clear_cart',
            data:{ip:$ip},
            success: function(res){
                loadCart();
            }
        });
    });

    // GETING THE COUNT OF ITEM IN CART
    setInterval(function(){
        getNotify();
        loadCartView();
    }, 5000);

    function getNotify(){
        $.ajax({
            type:'get',
            url:'/getCountCart',
            // data:{data},
            dataType:'json',
            success: function(data){
              $('#total_item_inCart').text(data.totalItem);
            },
            error: function(r,e,error){
              console.log(error);
            }
        });
    }
    getNotify();

    // Check for Update
    $('#save_details').on('change', function(){
        $state = $(this).prop('checked');
        if($state == true){
            $('#login_opt').slideDown();
        }else{
            $('#login_opt').slideUp(); 
        }
    });

    // Returning user login
    $('#return_user').on('change', function(){
        $state = $(this).prop('checked');
        if($state == true){
            $('#login_option').slideDown();
        }else{
            $('#login_option').slideUp(); 
        }
    });

    // Process Order
    $('#process_order').on('click',function(){
        $('#saveorder2').click()
        // document.findElementById('saveorder2').click();
        // alert('hi');
    });


    // PAYMENT PROCESSING
    $('#pay').on('click',function(){
       
        let email = $('#email').val().toString();
        let amount = $('#amount').val();
        let phone = $('#number').val().toString();
        // let name = $('#name').val().toString();
        // let accountid = $('#accountid').val().toString(); 
        // let transid = $('#transid').val().toString();
    
        // if(amount != ""){
            
        payWithRave() // TRIGGER PAYWITHRAVE TO POP-UP

        function payWithRave() {

            var x = getpaidSetup({
                PBFPubKey: 'FLWPUBK_TEST-492831b584fbd1539b8fa9c8cc455428-X',
                customer_email: email,
                amount: amount,
                customer_phone: phone,
                currency: "NGN",
                txref: "rave-123456",
                meta: [{
                    metaname: "flightID",
                    metavalue: "AP1234"
                }],
                onclose: function() {
                    $('#msg').html('');
                },
                callback: function(response) {
                    var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        $email = $('#email').val();
                        // saving order
                        $.ajax({
                            type:'get',
                            url:'/save_order',
                            data:{email:$email},
                            dataType:'json',
                            success: function(res){
                                if(res.status == 'success'){
                                    window.location.href = res.url;
                                    // alert('inside');
                                }
                                // console.log('outside', res);
                            },
                            error: function(e,r,error){
                                console.log(error);
                            }
                        });
    
                    } else {
                        $('#errorModal').on('show.bs.modal', function(){
                            $('#modalMsg').text("An error occured while proccessing payment, try again later");
                        });
                        $('#errorModal').modal('show');
                    }
    
                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    });

    // RETURNING CUSTOMER PAYMENT PROCESSING
    $('#payauth').on('click',function(){
       
        let email = $('#emailauth').val().toString();
        let amount = $('#amount').val();
        let phone = $('#numberauth').val().toString();
             
            payWithRave() // TRIGGER PAYWITHRAVE TO POP-UP

            function payWithRave() {
    
                var x = getpaidSetup({
                    PBFPubKey: 'FLWPUBK_TEST-492831b584fbd1539b8fa9c8cc455428-X',
                    customer_email: email,
                    amount: amount,
                    customer_phone: phone,
                    currency: "NGN",
                    txref: "rave-123456",
                    meta: [{
                        metaname: "flightID",
                        metavalue: "AP1234"
                    }],
                    onclose: function() {
                        $('#msg').html('');
                    },
                    callback: function(response) {
                        var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                        console.log("This is the response returned after a charge", response);
                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            $customerid = $('#customerid').val();
                            // saving order
                            $.ajax({
                                type:'get',
                                url:'/save_order_auth',
                                data:{customerid:$customerid},
                                dataType:'json',
                                success: function(res){
                                    if(res.status == 'success'){
                                        window.location.href = res.url;
                                        // alert('inside');
                                    }
                                    // console.log('outside', res);
                                },
                                error: function(e,r,error){
                                    console.log(error);
                                }
                            });
        
                        } else {
                            $('#errorModal').on('show.bs.modal', function(){
                                $('#modalMsg').text("An error occured while proccessing payment, try again later");
                            });
                            $('#errorModal').modal('show');
                        }
        
                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }
    });

});