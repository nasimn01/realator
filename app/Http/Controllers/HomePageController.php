<?php

namespace App\Http\Controllers;

use App\Models\home_page;
use Illuminate\Http\Request;
use App\Http\Requests\home\addNewRequest;
use App\Http\Requests\home\updateRequest;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class HomePageController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = home_page::first();
        if($home)
            return view('homePage.index',compact('home'));
        else
            return view('homePage.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addNewRequest $request)
    {
        try{
            $home = new home_page();

            $home->title_1 = $request->title1;
            $home->title_2 = $request->title2;
            $home->title_3 = $request->title3;
            $home->contact_no = $request->contact;
            $home->fb_message_link = $request->fb_message_link;
            $home->whatsapp_number = $request->whatsapp_number;
            $home->whatsapp_call_link = $request->whatsapp_call_link;
            $home->sms_number = $request->sms_number;
            $home->facebook = $request->facebook;
            $home->twitter = $request->twitter;
            $home->linkedin = $request->linkedin;
            if($request->has('logo'))
                $home->logo=$this->resizeImage($request->logo,'uploads/logo',true,700,300,false);

            if($request->has('contact_img'))
                $home->contact_img=$this->resizeImage($request->contact_img,'uploads/contact_img',true,439,474,false);

            if($home->save()){
                Toastr::success('Created Successfully');
                return redirect()->route(currentUser().'.home.index');
            }else{
                Toastr::error('please try again');
                return redirect()->back();
            }

        }
        catch(Exception $e){
            Toastr::error('Please try again');
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\home_page  $home_page
     * @return \Illuminate\Http\Response
     */
    public function show(home_page $home_page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\home_page  $home_page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home = home_page::findOrFail(encryptor('decrypt', $id));
        return view('homePage.edit',compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\home_page  $home_page
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        try{
            $home = home_page::findOrFail(encryptor('decrypt', $id));

            $home->title_1 = $request->title1;
            $home->title_2 = $request->title2;
            $home->title_3 = $request->title3;
            $home->contact_no = $request->contact;
            $home->fb_message_link = $request->fb_message_link;
            $home->whatsapp_number = $request->whatsapp_number;
            $home->whatsapp_call_link = $request->whatsapp_call_link;
            $home->sms_number = $request->sms_number;
            $home->facebook = $request->facebook;
            $home->twitter = $request->twitter;
            $home->linkedin = $request->linkedin;

            $path='uploads/logo';
            if($request->has('logo') && $request->logo)
            if($this->deleteImage($home->logo,$path))
                $home->logo=$this->resizeImage($request->logo,$path,true,700,300,false);

            $path2='uploads/contact_img';
            if($request->has('contact_img') && $request->contact_img)
            if($this->deleteImage($home->contact_img,$path2))
                $home->contact_img=$this->resizeImage($request->contact_img,$path2,true,439,474,false);

            if($home->save()){
                Toastr::success('Updated Successfully');
                return redirect()->route(currentUser().'.home.index');
            }else{
                Toastr::error('please try again');
                return redirect()->back();
            }

        }
        catch(Exception $e){
            Toastr::error('Please try again');
            dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\home_page  $home_page
     * @return \Illuminate\Http\Response
     */
    public function destroy(home_page $home_page)
    {
        //
    }
}
