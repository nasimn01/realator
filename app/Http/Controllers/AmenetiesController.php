<?php

namespace App\Http\Controllers;

use App\Models\ameneties;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class AmenetiesController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adv = ameneties::paginate(10);
        return view('ameneties.index',compact('adv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ameneties.create');
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
            $adv=new ameneties;
            $adv->name = $request->name;
            if($request->has('feature'))
            $adv->icon=$this->resizeImage($request->feature,'uploads/ameneties',true,20,20,true);
            if($adv->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.ameneties.index');
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
     * @param  \App\Models\ameneties  $ameneties
     * @return \Illuminate\Http\Response
     */
    public function show(ameneties $ameneties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ameneties  $ameneties
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adv=ameneties::findOrFail(encryptor('decrypt',$id));
        return view('ameneties.edit',compact('adv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ameneties  $ameneties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $adv=ameneties::findOrFail(encryptor('decrypt',$id));
            $adv->name = $request->name;

            $path='uploads/ameneties';
            if($request->has('feature') && $request->feature)
            if($this->deleteImage($adv->icon,$path))
                $adv->icon=$this->resizeImage($request->feature,$path,true,20,20,true);

            if($adv->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.ameneties.index');
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
     * @param  \App\Models\ameneties  $ameneties
     * @return \Illuminate\Http\Response
     */
    public function destroy(ameneties $ameneties)
    {
        //
    }
}
