<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Blogcategory;
use App\Models\Category;

use File;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\DB;
use Throwable;

class BlogController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file

public function getslug($value){
    $slug = SlugService::createSlug(Blog::class, 'slug', $value);
   return response()->json($slug);
  }

    use status;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::orderBy('id','desc')->get();
       return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',

        ]);
        // try {
       $blog=[];

            $file=$request->file('image');

            if($file){
                $fname=rand().'blog.'.$file->getClientOriginalExtension();
                $blog['guid']='upload/blog/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/blog/',$fname);
            }
            $blog['post_title']=$request->title;
            $blog['post_date']=today();
            $blog['post_status']='publish';


            $blog['post_content']=$request->content;
           DB::table('blogs')->insert($blog);
          
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Blog  updated',

                 );
                 return redirect()->route('admin.blogs.index')->with($notification);
            


        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Something went wrong. Please try again later.',

        //      );
        //      return redirect()->back()->with($notification);

        // }

    }

    public function edit(Blog $blog)
    {
              $blog=Blog::find($blog->ID);
        return view('admin.blog.edit',compact('blog'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|max:255',

        ]);
        try {
       $blog=[];

            $file=$request->file('image');

            if($file){
                $category=Blog::where('ID',$id)->first();
                File::delete(public_path($category->image));
                $fname=rand().'category.'.$file->getClientOriginalExtension();
                $blog['guid']='upload/blog/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/blog/',$fname);
            }
            $blog['post_title']=$request->title;
            $blog['post_content']=$request->content;
           DB::table('blogs')->where('ID',$id)->update($blog);
          
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Blog  updated',

                 );
                 return redirect()->route('admin.blogs.index')->with($notification);
            


        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Something went wrong. Please try again later.',

             );
             return redirect()->back()->with($notification);

        }

    }

    public function destroy($id)
    {
        try {
        DB::table('blogs')->where('ID',$id)->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted .',
               
             );
        } catch (Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete , Try again.',
               
             );
        }

        return redirect()->back()->with($notification);
    }

}
