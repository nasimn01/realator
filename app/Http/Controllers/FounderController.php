<?php

namespace App\Http\Controllers;

use App\Models\founder;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class FounderController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $found= founder::all();
        return view('founder.index',compact('found'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('founder.create');
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
            $found=new founder;
            $found->title = $request->title;
            $found->sub_title = $request->sub_title;
            $found->name = $request->name;
            $found->facebook = $request->facebook;
            $found->youtube = $request->youtube;
            $found->linkedin = $request->linkedin;
            $found->message = $request->message;
            if($request->has('Picture'))
            $found->image=$this->resizeImage($request->Picture,'uploads/founder',true,200,200,true);
            if($found->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.founder.index');
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
     * @param  \App\Models\founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function show(founder $founder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $found = founder::findOrFail(encryptor('decrypt', $id));
        return view('founder.edit',compact('found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $found= founder::findOrFail(encryptor('decrypt', $id));
            $found->title = $request->title;
            $found->sub_title = $request->sub_title;
            $found->name = $request->name;
            $found->facebook = $request->facebook;
            $found->youtube = $request->youtube;
            $found->linkedin = $request->linkedin;
            $found->message = $request->message;
            $path='uploads/founder';
            if($request->has('Picture') && $request->Picture)
            if($this->deleteImage($found->image,$path))
                $found->image=$this->resizeImage($request->Picture,$path,true,700,300,false);

            if($found->save()){
            Toastr::success('updated Successfully!');
            return redirect()->route(currentUser().'.founder.index');
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
     * @param  \App\Models\founder  $founder
     * @return \Illuminate\Http\Response
     */
    public function destroy(founder $founder)
    {
        //
    }
}
