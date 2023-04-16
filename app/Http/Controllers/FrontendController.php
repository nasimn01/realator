<?php

namespace App\Http\Controllers;

use App\Models\home_page;
use App\Models\blog;
use App\Models\terms_and_condition;
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
        $feature_property = property::where('is_feature',1)->get();
        $homePage = home_page::latest()->take(1)->first();
        $search_location = location::all();
        $propertyTypes = $request->input('property_type') ?? []; // Get selected property types or an empty array
        $locations = $request->input('location') ?? []; // Get selected locations or an empty array
        $priceRanges = $request->input('price_range') ?? []; // Get selected price ranges or an empty array
        $search = $request->input('name') ?? ''; // Get search term or an empty string
        $sortBy = request('sort_by');
        
        $properties = Property::query();

         // Filter by selected asc, des, a to z, z to a
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

        // Filter by selected property types
        if (!empty($propertyTypes)) {
            $properties->whereIn('property_category_id', $propertyTypes);
        }

        // Filter by selected locations
        if (!empty($locations)) {
            $properties->whereIn('location', $locations);
        }

        // Filter by selected price ranges
        if (!empty($priceRanges)) {
            $priceRangeArray = [];
            foreach ($priceRanges as $priceRange) {
                // Convert price range string to min and max values
                list($minPrice, $maxPrice) = explode('-', $priceRange);
                $priceRangeArray[] = [$minPrice, $maxPrice];
            }
            $properties->where(function ($query) use ($priceRangeArray) {
                foreach ($priceRangeArray as $priceRange) {
                    $query->orWhereBetween('price', $priceRange);
                }
            });
        }

        // Filter by search term
        if ($search != "") {
            $properties->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('price', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('locat', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%'.$search.'%');
                    });
                });
        }

        $properties = $properties->paginate(10);

        return view('frontend.search', compact('homePage','properties','feature_property','search_location', 'propertyTypes', 'locations', 'priceRanges', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function singleProperty($slug)
    {
        
        $homePage = home_page::latest()->take(1)->first();

        $feature_property = property::where('is_feature',1)->latest()->take(10)->get();
        $singleProp = property::where('id', $slug)->first();

        $property_review = property_review::where('property_id',[$singleProp->id])->paginate(10);
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
    
    public function termsCondition()
    {
        $terms = terms_and_condition::latest()->take(1)->first();
        $homePage = home_page::latest()->take(1)->first();

        return view('frontend.terms',compact('homePage','terms'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function location()
    {
        $location = location::paginate(10);
        
        $homePage = home_page::latest()->take(1)->first();

        return view('frontend.location',compact('homePage','location'));
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
    
    public function singleBlog($slug)
    {
        $homePage = home_page::latest()->take(1)->first();
        $blog = blog::where('id', $slug)->first();

        return view('frontend.singleBlog',compact('homePage','blog'));
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
