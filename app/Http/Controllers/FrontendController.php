<?php

namespace App\Http\Controllers;

use App\Models\home_page;
use App\Models\blog;
use App\Models\subscriber_email;
use App\Models\property_category;
use App\Models\customer_review;
use App\Models\property_photo;
use App\Models\property;
use App\Models\location;
use App\Models\slider;
use App\Models\founder;
use Illuminate\Http\Request;
use App\Http\Traits\ImageHandleTraits;
use App\Models\advance_feature;
use App\Models\ameneties;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
class FrontendController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::all();
        $customer = customer_review::all();
        $property = property::where('status', '1')->get();
        $location = location::all();
        $found = founder::take(1)->first();
        $homePage = home_page::take(1)->first();
        $slider = slider::all();
        return view('frontend.home',compact('homePage','slider','found','location','property','customer','blog'));
    }
    
    public function singleProperty($slug)
    {
        
        $homePage = home_page::take(1)->first();

        $feature_property = property::where('is_feature',1)->get();
        $singleProp = property::where('id', $slug)->first();
        $ame = ameneties::whereIn('id',explode(',',$singleProp->ameneties))->get();
        $adv = advance_feature::whereIn('id',explode(',',$singleProp->advance_feature))->get();
        $propPhoto = property_photo::whereIn('property_id',[$singleProp->id])->get();
        return view('frontend.singleProperty',compact('singleProp','propPhoto','homePage','ame','adv','feature_property'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscriber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emailAdress' => 'required|email|unique:subscriber_emails,email',
        ]);
        
        $validator->errors()->add('emailAdress.email', 'Please enter a valid email address.');
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        
        $user = new subscriber_email;
        $user->email = $request->emailAdress;
        
        if ($user->save()) {
            return redirect()->back()
                ->with('success', 'Your email was submitted successfully!');
        } else {
            return redirect()->back()
                ->with('error', 'There was an error submitting your email. Please try again later.');
        }
        

        // try{
        //     $user=new subscriber_email;
        //     $user->email = $request->emailAdress;

        //     if($user->save()){
        //     Toastr::success('Create Successfully!');
        //     return redirect()->back();
        //     } else{
        //     Toastr::success('Please try Again!');
        //      return redirect()->back();
        //     }

        // }
        // catch (Exception $e){
        //     dd($e);
        //     return back()->withInput();

        // }
    }
}
