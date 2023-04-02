<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class LocationController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loc = location::paginate(10);
        return view('location.index',compact('loc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
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
            $loc=new location;
            $loc->name = $request->name;

            if($request->has('picture'))
            $loc->feature_img=$this->resizeImage($request->feature,'uploads/location',true,280,332,false);
            
            if($loc->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.location.index');
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
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loc=location::findOrFail(encryptor('decrypt',$id));
        return view('location.edit',compact('loc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $loc= location::findOrFail(encryptor('decrypt',$id));
            $loc->name = $request->name;

            $path='uploads/location';
            if($request->has('feature') && $request->feature)
            if($this->deleteImage($loc->feature_img,$path))
                $loc->feature_img=$this->resizeImage($request->feature,$path,true,280,332,false);
                
            if($loc->save()){
            Toastr::success('Update Successfully!');
            return redirect()->route(currentUser().'.location.index');
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
     * @param  \App\Models\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        //
    }
}
