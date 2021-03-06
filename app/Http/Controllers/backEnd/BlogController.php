<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

use File;
use Illuminate\Support\Facades\DB;
use Throwable;

class BlogController extends Controller
{



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
                $blog['image']='upload/blog/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/blog/',$fname);
            }
            $blog['title']=$request->title;
            $blog['status']=1;


            $blog['detail']=$request->content;
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
              $blog=Blog::find($blog->id);
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
                $category=Blog::where('id',$id)->first();
                File::delete(public_path($category->image));
                $fname=rand().'blog.'.$file->getClientOriginalExtension();
                $blog['guid']='upload/blog/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/blog/',$fname);
            }
            $blog['title']=$request->title;
            $blog['detail']=$request->content;
           DB::table('blogs')->where('id',$id)->update($blog);
          
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
        DB::table('blogs')->where('id',$id)->delete();
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











    protected function active($id,$table){
        DB::table($table)->where('ID',$id)->update([
             'post_status'=>'publish',
         ]);
         $notification=array(
             'alert-type'=>'success',
             'messege'=>'Status: Activated.',

          );
          return redirect()->back()->with($notification);
     }

     protected function deactive($id,$table){
        DB::table($table)->where('ID',$id)->update([
            'post_status'=>'disable',
        ]);
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Status: Deactivated',

         );
         return redirect()->back()->with($notification);
    }

}
