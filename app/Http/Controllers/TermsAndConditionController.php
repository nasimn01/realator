<?php

namespace App\Http\Controllers;

use App\Models\terms_and_condition;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;


class TermsAndConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms = terms_and_condition::latest()->take(1)->get();
        return view('terms.index',compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $term=new terms_and_condition;
            $term->title = $request->title;
            $term->terms_and_condition = $request->terms;
            
            if($term->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.terms.index');
            } else{
            Toastr::success('Please try Again!');
             return redirect()->back();
            }

        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\terms_and_condition  $terms_and_condition
     * @return \Illuminate\Http\Response
     */
    public function show(terms_and_condition $terms_and_condition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\terms_and_condition  $terms_and_condition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term= terms_and_condition::findOrFail(encryptor('decrypt',$id));
        return view('terms.edit',compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\terms_and_condition  $terms_and_condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $term= terms_and_condition::findOrFail(encryptor('decrypt',$id));
            $term->title = $request->title;
            $term->terms_and_condition = $request->terms;
            
            if($term->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.terms.index');
            } else{
            Toastr::success('Please try Again!');
             return redirect()->back();
            }

        }
        catch (Exception $e){
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\terms_and_condition  $terms_and_condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(terms_and_condition $terms_and_condition)
    {
        //
    }
}
