<?php

namespace App\Http\Controllers;

use App\Models\advance_feature;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class AdvanceFeatureController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adv = advance_feature::paginate(10);
        return view('advanceFeature.index',compact('adv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advanceFeature.create');
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
            $adv=new advance_feature;
            $adv->feature = $request->name;
            if($request->has('feature'))
            $adv->icon=$this->resizeImage($request->feature,'uploads/advance_feature',true,20,20,true);
            if($adv->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.advance.index');
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
     * @param  \App\Models\advance_feature  $advance_feature
     * @return \Illuminate\Http\Response
     */
    public function show(advance_feature $advance_feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advance_feature  $advance_feature
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adv=advance_feature::findOrFail(encryptor('decrypt',$id));
        return view('advanceFeature.edit',compact('adv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advance_feature  $advance_feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $adv=advance_feature::findOrFail(encryptor('decrypt',$id));
            $adv->feature = $request->name;

            $path='uploads/advance_feature';
            if($request->has('feature') && $request->feature)
            if($this->deleteImage($adv->icon,$path))
                $adv->icon=$this->resizeImage($request->feature,$path,true,20,20,true);

            if($adv->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.advance.index');
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
     * @param  \App\Models\advance_feature  $advance_feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(advance_feature $advance_feature)
    {
        //
    }
}
