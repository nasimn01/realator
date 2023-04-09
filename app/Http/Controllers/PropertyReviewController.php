<?php

namespace App\Http\Controllers;

use App\Models\property_review;
use Illuminate\Http\Request;
use App\Http\Requests\preview\addnewRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use App\Http\Traits\ResponseTrait;
use Exception;

class PropertyReviewController extends Controller
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
    public function store(addnewRequest $request)
    {
        try{
            $cq= new property_review;
            $cq->name = $request->name;
            $cq->property_id = $request->property_id;
            $cq->email = $request->emailAddress;
            $cq->message = $request->message;
            $cq->property_rating = $request->property;
            $cq->location_rating = $request->location;
            $cq->value_of_money_rating = $request->value_of_Money;
            $cq->agent_support_rating = $request->agent_support;
            
            if($cq->save()){
            Toastr::success('Review Submited Successfully!');
            return redirect()->back();
            } else{
            Toastr::warning('Please try Again!');
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
     * @param  \App\Models\property_review  $property_review
     * @return \Illuminate\Http\Response
     */
    public function show(property_review $property_review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\property_review  $property_review
     * @return \Illuminate\Http\Response
     */
    public function edit(property_review $property_review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\property_review  $property_review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, property_review $property_review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\property_review  $property_review
     * @return \Illuminate\Http\Response
     */
    public function destroy(property_review $property_review)
    {
        //
    }
}
