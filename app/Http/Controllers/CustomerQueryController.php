<?php

namespace App\Http\Controllers;

use App\Models\customer_query;
use App\Models\property;
use Illuminate\Http\Request;
use App\Http\Requests\query\addnewRequest;
use App\Http\Requests\query\updateRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use App\Http\Traits\ResponseTrait;
use Exception;

class CustomerQueryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cq = customer_query::latest()->paginate(10);
        return view('query.index',compact('cq'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function queryView()
    {
        $cquery = customer_query::paginate(4);
        return view('dasbhoard.admin',compact('cquery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fronted.singleProperty');
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
            $cq=new customer_query;
            $cq->name = $request->name;
            $cq->phone = $request->phoneNumber;
            $cq->email = $request->emailAddress;
            $cq->address = $request->address;
            $cq->message = $request->message;
            if($cq->save()){
            Toastr::success('Query Submited Successfully!');
            return redirect()->back();
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customerQuery(addnewRequest $r)
    {
        try{
            $cq= new customer_query;
            $cq->name = $r->name;
            $cq->property_id = $r->property_id;
            $cq->phone = $r->phoneNumber;
            $cq->email = $r->emailAddress;
            $cq->address = $r->address;
            $cq->message = $r->message;
            if($cq->save()){
            Toastr::success('Query Submited Successfully!');
            return redirect()->back();
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
     * @param  \App\Models\customer_query  $customer_query
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = customer_query::findOrFail(encryptor('decrypt',$id));
        $singleProp = property::where('id',[$query->property_id])->first();
        return view('query.show',compact('query','singleProp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer_query  $customer_query
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cq = customer_query::findOrFail(encryptor('decrypt',$id));
        return view('query.edit',compact('cq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_query  $customer_query
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer_query  $customer_query
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer_query $customer_query)
    {
        //
    }
}
