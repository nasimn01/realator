<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class SliderController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::paginate(10);
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
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
            $slider=new Slider;
            if($request->has('Picture'))
            $slider->image=$this->resizeImage($request->Picture,'uploads/Slide_image',true,1920,803,true);
            if($slider->save()){
            Toastr::success('Slider Create Successfully!');
            return redirect()->route(currentUser().'.slider.index');
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
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::findOrFail(encryptor('decrypt',$id));
        return view('slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $slider=Slider::findOrFail(encryptor('decrypt',$id));

            $path='uploads/Slide_image';
            if($request->has('Picture') && $request->Picture)
            if($this->deleteImage($slider->image,$path))
                $slider->image=$this->resizeImage($request->Picture,$path,true,1920,803,true);

            if($slider->save()){
            Toastr::success('Slider Update Successfully!');
            return redirect()->route(currentUser().'.slider.index');
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
     * @param  \App\Models\slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(slider $slider)
    {
        //
    }
}
