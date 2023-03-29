<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\property_category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class BlogController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::paginate(10);
        return view('blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propCat = property_category::all();
        return view('blog.create',compact('propCat'));
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
            $blog=new blog;
            $blog->property_category_id = $request->category;
            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->bolg_date = $request->date;
            if($request->has('bolg_image'))
            $blog->bolg_image=$this->resizeImage($request->bolg_image,'uploads/blog',true,200,200,true);
            if($blog->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.blog.index');
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
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = blog::findOrFail(encryptor('decrypt',$id));
        $propCat = property_category::all();
        return view('blog.edit',compact('propCat','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $blog= blog::findOrFail(encryptor('decrypt',$id));
            $blog->property_category_id = $request->category;
            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->bolg_date = $request->date;

            $path='uploads/blog';
            if($request->has('bolg_image') && $request->bolg_image)
            if($this->deleteImage($blog->bolg_image,$path))
                $blog->bolg_image=$this->resizeImage($request->bolg_image,$path,true,200,200,true);

            if($blog->save()){
            Toastr::success('Create Successfully!');
            return redirect()->route(currentUser().'.blog.index');
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
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
