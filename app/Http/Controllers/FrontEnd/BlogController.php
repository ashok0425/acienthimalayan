<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;
class BlogController extends Controller
{

public function index(){
     $blogs=Blog::orderBy('id','desc')->where('post_status','publish')->where('post_title','!=',null)->paginate(12);
     return view('frontend.blog',compact('blogs'));
}



         
public function show($id){
     $blog=Blog::orderBy('ID','desc')->where('post_status','publish')->where('ID',$id)->first();
     $mores=Blog::where('post_status','publish')->inRandomOrder()->where('post_title','!=',null)->limit(5)->get();
       $next=Blog::where('post_status','publish')->inRandomOrder()->where('post_title','!=',null)->first();
       $prev=Blog::where('post_status','publish')->inRandomOrder()->where('post_title','!=',null)->first();

     return view('frontend.blog_detail',compact('blog','mores','next','prev'));
}






public function filterBlog(Request $request){
    $from= Carbon::parse($request->from)->format('Y-m-d');
    $to= Carbon::parse($request->to)->format('Y-m-d');
// $query='SELECT * FROM blogs WHERE post_date BETWEEN $from AND $to AND post_status='publish'";
     $blogs=Blog::orderBy('ID','desc')->where('post_status','publish')->where('post_title','!=',null)->whereBetween('post_date',[$from,$to])->get();
$data='';

if(count($blogs)<=0){
     return "<div class='col-md-4 col-sm-12  my-5 offset-md-4 text-danger custom-fw-700 custom-fs-25'>No Data Found</div>";

}
     foreach ($blogs as $blog) {
          $data.="<div class='col-md-4 col-sm-12  my-2'>
          <div class='post-card-1 card'>
              <a href='". route('blog.detail',['id'=>$blog->ID]) ."'>
              <div class='img-container'>";
                  if ($blog->guid!=null && file_exists($blog->guid))
                  {
                    $data.="<img src='". asset($blog->guid)."'  class='img-fluid w-100'>";
                  }else
                  {
                    $data.=   "<img src='". asset('frontend/assets/recent-post.png')."' alt='IMG' class='img-fluid'  >";
                  }
                  $data.= "<div class='date'>
                      <span>".
                       Carbon::parse($blog->post_date)->format('d')."
                  </span>                        
                       ". Carbon::parse($blog->post_date)->format('M Y') ."

                  </div>
              </div>
              <div class='px-2'>

              <div class='img-desc'>
                  <h2 class='custom-fs-18 text-dark custom-fw-700'>". Str::limit($blog->post_title,35) ."</h2>
              </div>
          </div>
              </a>
          </div>
      </div>";
     }
     return $data;
     
}

}