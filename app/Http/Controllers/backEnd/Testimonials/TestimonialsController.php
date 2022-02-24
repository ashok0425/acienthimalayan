<?php

namespace App\Http\Controllers\BackEnd\Testimonials;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\PackageTestimonial;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
class TestimonialsController extends Controller
{
 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::where('status',1)->get();
        return view('admin.testimonials.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $testimonials = new  Testimonial;
            $testimonials->name=$request->name;
            $testimonials->title=$request->title;
            $testimonials->content=$request->content;
            $testimonials->status=1;
            $testimonials->rating=$request->rating;
            $testimonials->package_id=$request->package;

            $testimonials->display_home=$request->display_home;
            $testimonials->date=$request->date;

            $banner=$request->file('file');
            if($banner){
                $fname=rand().$request->name.$banner->getClientOriginalExtension();
                $testimonials->image='upload/testimonial/'.$fname;
                $banner->move(public_path().'/upload/testimonial/',$fname);
            }
        $testimonials->save();
           


            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully Added Testimonial.',
               
             );
        } catch(QueryException $qE) {

            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to Added Testimonial.',
               
             );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        // dd($testimonials->packages->pluck('id'));
        $packages=Package::where('status',1)->get();
        return view('admin.testimonials.edit', compact('testimonial','packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
   
        try {
            $testimonials = Testimonial::findOrFail($id);
            $testimonials->name=$request->name;
            $testimonials->title=$request->title;
            $testimonials->content=$request->content;
            $testimonials->status=1;
            $testimonials->rating=$request->rating;
            $testimonials->package_id=$request->package;
            $testimonials->display_home=$request->display_home;
            $testimonials->date=$request->date;

            $banner=$request->file('file');
            if($banner){
                File::delete( $testimonials->image);
                $fname=rand().$request->name.$banner->getClientOriginalExtension();
                $testimonials->image='upload/testimonial/'.$fname;
                $banner->move(public_path().'/upload/testimonial/',$fname);
            }
            $testimonials->save();

            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully Updated Testimonial.',
               
             );
        } catch(QueryException $qE) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to updated Testimonial.',
               
             );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $testimonial = Testimonial::findOrFail($id);
            File($testimonial->image);
            $testimonial->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully Deleted Testimonial.',
               
             );
        } catch (QueryException $e) {
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Failed to delete  Testimonial.',
               
             );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
    }
}
