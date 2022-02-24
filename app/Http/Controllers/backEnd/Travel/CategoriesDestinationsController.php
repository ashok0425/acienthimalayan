<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Models\Category;
use App\Models\CategoryDestination;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Destination;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use File;
class CategoriesDestinationsController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = CategoryDestination::orderBy('created_at', 'desc')->get();

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations= Destination::all();

        return view('admin.categories.create',compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this->toAscii($request->name);
        $request['url'] = $url;
        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:categories_destinations'
        ]);

        try {
            DB::beginTransaction();
            $category = new CategoryDestination;
            $category->name = $request->name;
            $category->status = 1;
            $category->details = $request->details;
            $category->url = $request->url;
            $category->order=$request->order;
            $category->destination_id = $request->destination;
            $category->quick_trips = $request->quickk_trip;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;

            $file=$request->file('file');
            
            if($file){
                $fname=rand().$request->name.$file->getClientOriginalExtension();
                $category->image='upload/category/'.$fname;
                $file->move(public_path().'/upload/category/',$fname);

            }
            $category->save();

            DB::commit();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully created category.',
               
             );
            $this->status_message = "";
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create category, Try again.',
               
             );
        }

        return redirect()->route('admin.categories-destinations.index')->with($notification);
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
        $data['category'] = CategoryDestination::findOrFail($id);
        $data['destinations'] = Destination::all();

        return view('admin.categories.edit', $data);
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
        $url = $this->toAscii($request->name);
        $request['url'] = $url;

        $this->validate($request, [
            'name' => 'required|min:3|max:255|',
        ]);
        try {
            // DB::beginTransaction();
            $category =  CategoryDestination::find($id);
            $category->name = $request->name;
            $category->destination_id = $request->destination;
            $category->quick_trips = $request->quick_trip;
            $category->status = 1;
            $category->details = $request->details;
            $category->url = $request->url;
            $category->order=$request->order;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;

            $file=$request->file('file');
            
            if($file){
                File::delete($category->image);
                $fname=rand().$request->name.$file->getClientOriginalExtension();
                $category->image='upload/category/'.$fname;
                $file->move(public_path().'/upload/category/',$fname);

            }
            $category->save();

            // DB::commit();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully updated category.',
               
             );
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to updated category, Try again.',
               
             );
        }
        return redirect()->route('admin.categories-destinations.index')->with($notification);
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
            $destination = CategoryDestination::findOrFail($id);
            File::delete($destination->image);
            $destination->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted destinations.',
               
             );
            $this->status_message = "Successfully deleted destinations.";
        } catch (QueryException $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete destination, Try again.',
               
             );
        }

        return redirect()->back()->with($notification);
    }
  


    private function toAscii($str) {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }
}
