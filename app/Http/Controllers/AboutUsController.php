<?php

namespace App\Http\Controllers;

use App\Models\about_us;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class AboutUsController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = about_us::all();
        return view('about.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create');
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
            $about=new about_us;
            $about->title = $request->title;
            $about->short_text = $request->short_text;
            $about->long_description = $request->long_description;
            if($request->has('image_one'))
            $about->image_one=$this->resizeImage($request->image_one,'uploads/about/img1',true,340,538,false);
            if($request->has('image_two'))
            $about->image_two=$this->resizeImage($request->image_two,'uploads/about/img2',true,312,262,false);
            if($request->has('image_three'))
            $about->image_three=$this->resizeImage($request->image_three,'uploads/about/img3',true,306,270,false);
            if($about->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.about.index');
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
     * @param  \App\Models\about_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function show(about_us $about_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = about_us::findOrFail(encryptor('decrypt',$id));
        return view('about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $about= about_us::findOrFail(encryptor('decrypt',$id));
            $about->title = $request->title;
            $about->short_text = $request->short_text;
            $about->long_description = $request->long_description;

            $path='uploads/about/img1';
            if($request->has('image_one') && $request->image_one)
            if($this->deleteImage($about->image_one,$path))
                $about->image_one=$this->resizeImage($request->image_one,$path,true,340,538,false);

            $path2='uploads/about/img2';
            if($request->has('image_two') && $request->image_two)
            if($this->deleteImage($about->image_two,$path2))
                $about->image_two=$this->resizeImage($request->image_two,$path2,true,312,262,false);

            $path3='uploads/about/img3';
            if($request->has('image_three') && $request->image_three)
            if($this->deleteImage($about->image_three,$path3))
                $about->image_three=$this->resizeImage($request->image_three,$path3,true,306,270,false);

            if($about->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.about.index');
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
     * @param  \App\Models\about_us  $about_us
     * @return \Illuminate\Http\Response
     */
    public function destroy(about_us $about_us)
    {
        //
    }
}
