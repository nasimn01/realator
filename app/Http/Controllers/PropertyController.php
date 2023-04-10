<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\Models\property_category;
use App\Models\location;
use App\Models\advance_feature;
use App\Models\ameneties;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PropertyController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = property::paginate(10);
        return view('property.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proCat= property_category::all();
        $adv = advance_feature::all();
        $loc = location::all();
        $ameneties = ameneties::all();
        return view('property.create',compact('adv','loc','ameneties','proCat'));
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
            $pro =new property;
            $amenities = implode(',', $request->input('amenities', []));
            $adv = implode(',', $request->input('advance_feature', []));
            $pro->property_category_id = $request->property_cat;
            $pro->name = $request->name;
            $pro->price = $request->price;
            $pro->location = $request->location;
            $pro->address = $request->address;
            $pro->bed = $request->bed;
            $pro->bath = $request->bath;
            $pro->garage = $request->garage;
            $pro->description = $request->description;
            $pro->advance_feature = $adv;
            $pro->ameneties = $amenities;
            $pro->video_link = $request->video_link;
            $pro->map_link = $request->map;
            $pro->status = $request->status;
            $pro->is_feature = $request->is_feature;
            if($request->has('feature_photo'))
            $pro->feature_photo=$this->resizeImage($request->feature_photo,'uploads/property_feature',true,288,228,false);
            if($pro->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.property.index');
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
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proCat= property_category::all();
        $adv = advance_feature::all();
        $loc = location::all();
        $ameneties = ameneties::all();
        $prop = property::findOrFail(encryptor('decrypt',$id));
        return view('property.edit',compact('adv','loc','ameneties','prop','proCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $pro =property::findOrFail(encryptor('decrypt',$id));
            $amenities = implode(',', $request->input('amenities', []));
            $adv = implode(',', $request->input('advance_feature', []));
            $pro->property_category_id = $request->property_cat;
            $pro->name = $request->name;
            $pro->price = $request->price;
            $pro->location = $request->location;
            $pro->address = $request->address;
            $pro->bed = $request->bed;
            $pro->bath = $request->bath;
            $pro->garage = $request->garage;
            $pro->description = $request->description;
            $pro->advance_feature = $adv;
            $pro->ameneties = $amenities;
            $pro->video_link = $request->video_link;
            $pro->map_link = $request->map;
            $pro->status = $request->status;
            $pro->is_feature = $request->is_feature;

            $path='uploads/property_feature';
            if($request->has('feature_photo') && $request->feature_photo)
            if($this->deleteImage($pro->feature_photo,$path))
                $pro->feature_photo=$this->resizeImage($request->feature_photo,$path,true,288,228,false);

            if($pro->save()){
            Toastr::success('Update Successfully!');
            return redirect()->route(currentUser().'.property.index');
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
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro= property::findOrFail(encryptor('decrypt',$id));
        $pro->delete();
        return redirect()->back();
    }
    


}
