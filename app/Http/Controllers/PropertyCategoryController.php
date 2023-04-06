<?php

namespace App\Http\Controllers;

use App\Models\property_category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PropertyCategoryController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proCat = property_category::paginate(10);
        return view('category.index',compact('proCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category.create');
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
            $proCat=new property_category;
            $proCat->name = $request->name;
            if($request->has('feature_image'))
            $proCat->feature_image=$this->resizeImage($request->feature_image,'uploads/category',true,200,200,false);
            if($proCat->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.category.index');
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
     * @param  \App\Models\property_category  $property_category
     * @return \Illuminate\Http\Response
     */
    public function show(property_category $property_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\property_category  $property_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $proCat = property_category::findOrFail(encryptor('decrypt',$id));
        return view('category.edit',compact('proCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\property_category  $property_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $proCat=property_category::findOrFail(encryptor('decrypt',$id));
            $proCat->name = $request->name;

            $path='uploads/category';
            if($request->has('feature_image') && $request->feature_image)
            if($this->deleteImage($proCat->feature_image,$path))
                $proCat->feature_image=$this->resizeImage($request->feature_image,$path,true,200,200,false);
                
            if($proCat->save()){
            Toastr::success('Update Successfully!');
            return redirect()->route(currentUser().'.category.index');
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
     * @param  \App\Models\property_category  $property_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(property_category $property_category)
    {
        //
    }
}
