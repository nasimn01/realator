<?php

namespace App\Http\Controllers;

use App\Models\property_photo;
use App\Models\property;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PropertyPhotoController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proPhoto = property_photo::paginate(10);
        return view('propertyPhoto.index',compact('proPhoto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prop = property::all();
        return view('propertyPhoto.create',compact('prop'));
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
            $proPhoto=new property_photo;
            $proPhoto->property_id = $request->property;
            if($request->has('Picture'))
            $proPhoto->image=$this->resizeImage($request->Picture,'uploads/property_photo',true,200,200,true);
            if($proPhoto->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.proPhoto.index');
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
     * @param  \App\Models\property_photo  $property_photo
     * @return \Illuminate\Http\Response
     */
    public function show(property_photo $property_photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\property_photo  $property_photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prop = property::all();
        $photo = property_photo::findOrFail(encryptor('decrypt',$id));
        return view('propertyPhoto.edit',compact('prop','photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\property_photo  $property_photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $proPhoto=property_photo::findOrFail(encryptor('decrypt',$id));
            $proPhoto->property_id = $request->property;

            $path='uploads/property_photo';
            if($request->has('Picture') && $request->Picture)
            if($this->deleteImage($proPhoto->image,$path))
                $proPhoto->image=$this->resizeImage($request->Picture,$path,true,200,200,true);

            if($proPhoto->save()){
            Toastr::success('Update Successfully!');
            return redirect()->route(currentUser().'.proPhoto.index');
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
     * @param  \App\Models\property_photo  $property_photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(property_photo $property_photo)
    {
        //
    }
}
