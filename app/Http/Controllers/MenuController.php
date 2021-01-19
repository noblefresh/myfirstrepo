<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\menu;

class MenuController extends Controller
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
        //
       // creating product id
       $createid = time();
       $getmenuid = substr($createid, 4);
       if($file = $request->file('image')){
           $imagename = $file->getClientOriginalName();
           if($file->move('MenuImages',$imagename)){
               $save_menu = new menu;
               $save_menu->image = $imagename;
               $save_menu->menuid = $getmenuid;
               $save_menu->name = $request->name;
               $save_menu->status = $request->status;
               $save_menu->save();
               return redirect('/admin-menu')->with('success','Menu added successfully');
           }
           return redirect('/admin-menu')->with('error','Image could not be moved');
       }
       return redirect('/admin-menu')->with('error','No Image');
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
        $getMenu = menu::where('id',$id)->get();
        return view('admin.editmenu',['showmenu'=>$getMenu]);
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
        if($file = $request->file('image')){
            $imagename = $file->getClientOriginalName();
            if($file->move('MenuImages', $imagename)){
                $name = $request->input('name');
                $status = $request->input('status');
               
                DB::update('update menus set image = ?, name = ?, status = ? where id = ?', [$imagename, $name, $status, $id]);
                return redirect('/admin-menu')->with('success','Menu Updated Successfully!');
            }else{
                return redirect('/admin-menu')->with('error','An Error Occured! I cant update');
            }
        }else{
            $name = $request->input('name');
            $status = $request->input('status');

            DB::update('update menus set name = ?, status = ? where id = ?', [$name, $status, $id]);
            return redirect('/admin-menu')->with('success','Menu Updated Successfully!');
        }
        return redirect('/admin-menu')->with('error','An Error Occured! I cant move file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from menus where id = ?', [$id]);
        return redirect('/admin-menu')->with('success','Menu Deleted Successfully!');
    }
}
