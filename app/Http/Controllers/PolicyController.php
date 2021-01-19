<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\privacy_term_delivery;

class PolicyController extends Controller
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
    }
    
    public function update_policy(Request $request, $id){
        $policy = $request->policy;
        DB::update('update privacy_term_deliveries set policy = ? where id = ?', [$policy, $id]);
        return redirect('/privacy_terms_delivery')->with('success','Policy Updated Successfully!');
    }

    public function update_term(Request $request, $id){
        $term = $request->term;
        DB::update('update privacy_term_deliveries set term = ? where id = ?', [$term, $id]);
        return redirect('/privacy_terms_delivery')->with('success','Terms and Conditions Updated Successfully!');
    }

    public function update_delivery(Request $request, $id){
        $delivery = $request->delivery;
        DB::update('update privacy_term_deliveries set delivery = ? where id = ?', [$delivery, $id]);
        return redirect('/privacy_terms_delivery')->with('success','Delivery Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
