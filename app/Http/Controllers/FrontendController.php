<?php

namespace App\Http\Controllers;

use App\Models\home_page;
use App\Models\blog;
use App\Models\about_us;
use App\Models\about_us_motive;
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
use App\Models\property_review;
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
        $about = about_us::first();
        $about_motive = about_us_motive::latest()->take(6)->get();
        $search_property = property_category::all();
        $search_location = location::all();
        $blog = blog::latest()->take(4)->get();
        $customer = customer_review::latest()->take(3)->get();
        $property = property::where('status', '1')->latest()->take(4)->get();
        $location = location::latest()->take(4)->get();
        $found = founder::latest()->take(1)->first();
        $homePage = home_page::latest()->take(1)->first();
        $slider = slider::all();
        return view('frontend.home',compact('homePage','slider','found','location','property','customer','blog','search_property','search_location','about','about_motive'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\property  $property
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search_location = location::all();
        $feature_property = property::where('is_feature',1)->get();
        $homePage = home_page::latest()->take(1)->first();

        $sortBy = request('sort_by');
        $priceRange = request('price_range');
        $category = $request->input('category', '');
        $location = $request->input('locat', '');
        $search = $request['name']?? "";
        $bed = $request['bed']?? "";
        $propertyType = $request['property_type'] ?? "";
        $location_type = $request['locationType'] ?? "";

        $properties = Property::query();

        if ($search != "") {
            $properties->where('name', 'LIKE', '%'.$search.'%');
        }
        if ($propertyType != "") {
            $properties->where('property_category_id', $propertyType);
        }
        if ($location_type != "") {
            $properties->where('location', $location_type);
        }
        if ($bed != "") {
            $properties->where('bed', $bed);
        }


        if (!empty($category) && !empty($location)) {
            $properties->where(function ($query) use ($category, $location) {
                $query->where('property_category_id', $category)
                      ->where('location', 'LIKE', '%'.$location.'%');
            });
        } elseif (!empty($category)) {
            $properties->where('property_category_id', $category);
        } elseif (!empty($location)) {
            $properties->where('location'.'', 'LIKE', '%'.$location.'%');
        }

        switch ($sortBy) {
            case 'a_to_z':
                $properties->orderBy('name', 'asc');
                break;
            case 'z_to_a':
                $properties->orderBy('name', 'desc');
                break;
            case 'latest':
                $properties->latest();
                break;
            case 'oldest':
                $properties->oldest();
                break;
            default:
                $properties->latest(); // Default to "latest" if no option is selected
                break;
        }
        
        switch ($priceRange) {
            case '0-999':
                $properties->where('price', '>=', 0)->where('price', '<=', 999);
                break;
            case '1000-1999':
                $properties->where('price', '>=', 1000)->where('price', '<=', 1999);
                break;
            case '2000-2999':
                $properties->where('price', '>=', 2000)->where('price', '<=', 2999);
                break;
            case '3000-3999':
                $properties->where('price', '>=', 3000)->where('price', '<=', 3999);
                break;
            case '4000-4999':
                $properties->where('price', '>=', 4000)->where('price', '<=', 4999);
                break;
            case '5000-5999':
                $properties->where('price', '>=', 5000)->where('price', '<=', 5999);
                break;
            default:
                // No price range selected, do nothing
                break;
        }

        $properties = $properties->paginate(10);

        return view('frontend.search', compact('properties','search','homePage','feature_property','propertyType','search_location','location_type','bed','category','location'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function singleProperty($slug)
    {
        
        $homePage = home_page::latest()->take(1)->first();

        $feature_property = property::where('is_feature',1)->get();
        $singleProp = property::where('id', $slug)->first();

        $property_review = property_review::where('property_id',[$singleProp->id])->get();
        $property_rating = property_review::where('property_id',[$singleProp->id])->avg('property_rating') * 20;
        $location_rating = property_review::where('property_id',[$singleProp->id])->avg('location_rating') * 20;
        $value_of_money_rating = property_review::where('property_id',[$singleProp->id])->avg('value_of_money_rating') * 20;
        $agent_support_rating = property_review::where('property_id',[$singleProp->id])->avg('agent_support_rating') * 20;
        $overall_average = property_review::where('property_id',[$singleProp->id])->avg('property_rating', 'location_rating', 'value_of_money_rating', 'agent_support_rating');
        $average = number_format($overall_average, 1);

        $ame = ameneties::whereIn('id',explode(',',$singleProp->ameneties))->get();
        $adv = advance_feature::whereIn('id',explode(',',$singleProp->advance_feature))->get();
        $propPhoto = property_photo::whereIn('property_id',[$singleProp->id])->get();
        return view('frontend.singleProperty',compact('singleProp','propPhoto','homePage','ame','adv','feature_property','property_review','property_rating','location_rating','value_of_money_rating','agent_support_rating','average'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function aboutUs()
    {
        $about = about_us::first();
        $about_motive = about_us_motive::all();
        
        $homePage = home_page::latest()->take(1)->first();

        return view('frontend.about',compact('homePage','about_motive','about'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function contactUs()
    {
        $homePage = home_page::latest()->take(1)->first();

        return view('frontend.contact',compact('homePage'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function blog()
    {
        $homePage = home_page::latest()->take(1)->first();
        $blog = blog::paginate(10);

        return view('frontend.blog',compact('homePage','blog'));
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
