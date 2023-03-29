<?php

namespace App\Http\Controllers;

use App\Models\customer_review;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class CustomerReviewController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer_review::paginate(10);
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            $proCat=new customer_review;
            $proCat->name = $request->name;
            $proCat->review = $request->review;
            $proCat->location = $request->location;
            if($request->has('image'))
            $proCat->image=$this->resizeImage($request->image,'uploads/customer',true,200,200,true);
            if($proCat->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.review.index');
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
     * @param  \App\Models\customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function show(customer_review $customer_review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer_review::findOrFail(encryptor('decrypt',$id));
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $proCat= customer_review::findOrFail(encryptor('decrypt',$id));
            $proCat->name = $request->name;
            $proCat->review = $request->review;
            $proCat->location = $request->location;

            $path='uploads/customer';
            if($request->has('image') && $request->image)
            if($this->deleteImage($proCat->image,$path))
                $proCat->image=$this->resizeImage($request->image,$path,true,200,200,true);

            if($proCat->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.review.index');
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
     * @param  \App\Models\customer_review  $customer_review
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer_review $customer_review)
    {
        //
    }
}
