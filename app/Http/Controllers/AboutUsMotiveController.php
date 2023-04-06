<?php

namespace App\Http\Controllers;

use App\Models\about_us_motive;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class AboutUsMotiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motive = about_us_motive::paginate(10);
        return view('aboutMotive.index',compact('motive'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aboutMotive.create');
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
            $m=new about_us_motive;
            $m->motive = $request->motive;
            if($m->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.aboutMotive.index');
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
     * @param  \App\Models\about_us_motive  $about_us_motive
     * @return \Illuminate\Http\Response
     */
    public function show(about_us_motive $about_us_motive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about_us_motive  $about_us_motive
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motive = about_us_motive::findOrFail(encryptor('decrypt',$id));
        return view('aboutMotive.edit',compact('motive'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about_us_motive  $about_us_motive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $m= about_us_motive::findOrFail(encryptor('decrypt',$id));
            $m->motive = $request->motive;
            if($m->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.aboutMotive.index');
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
     * @param  \App\Models\about_us_motive  $about_us_motive
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro= about_us_motive::findOrFail(encryptor('decrypt',$id));
        $pro->delete();
        return redirect()->back();
    }
}
