<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // creating product id
        $createid = time();
        $getproductid = substr($createid, 5);
        if($file = $request->file('image')){
            $name = $file->getClientOriginalName();
            if($file->move('ProductImages',$name)){
                $save_product = new product;
                $save_product->image = $name;
                $save_product->productid = $getproductid;
                $save_product->name = $request->name;
                $save_product->amount = $request->amount;
                $save_product->menu = $request->menu;
                $save_product->description = $request->description;
                $save_product->type = $request->type;
                $save_product->category = $request->category;
                $save_product->save();
                return redirect('/productlist')->with('success','Your Food has been saved and addad to display');
            }
            return redirect('/addproduct')->with('error','Image could not be moved');
        }
        return redirect('/addproduct')->with('error','No Image');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return $id;
        $getFood = product::where('id',$id)->get();
        // return $getFood;
        return view('admin.editproduct',['showfood'=>$getFood]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // return $id;
        if($file = $request->file('image')){
            $imagename = $file->getClientOriginalName();
            if($file->move('ProductImages', $imagename)){
                $name = $request->input('name');
                $menu = $request->input('menu');
                $category = $request->input('category');
                $type = $request->input('type');
                $amount = $request->input('amount');
                $description = $request->input('description');

                DB::update('update products set image = ?, name = ?, menu = ?, category = ?, type = ?, amount = ?, description = ? where id = ?', [$imagename, $name, $menu, $category, $type, $amount, $description, $id]);
                return redirect('/productlist')->with('success','Selected Item Updated Successfully!');
            }else{
                return redirect('/productlist')->with('error','An Error Occured! I cant update');
            }
        }else{
            $name = $request->input('name');
            $menu = $request->input('menu');
            $category = $request->input('category');
            $type = $request->input('type');
            $amount = $request->input('amount');
            $description = $request->input('description');

            DB::update('update products set name = ?, menu = ?, category = ?, type = ?, amount = ?, description = ? where id = ?', [$name, $menu, $category, $type, $amount, $description, $id]);
            return redirect('/productlist')->with('success','Selected Item Updated Successfully!');
        }
        return redirect('/productlist')->with('error','An Error Occured! I cant move file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from products where id = ?', [$id]);
        return redirect('/productlist')->with('success','Selected Item Deleted Successfully!');
    }
}
