<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{

public function index(){
     $blogs=Blog::orderBy('id','desc')->where('post_status','publish')->where('post_title','!=',null)->paginate(12);
     return view('frontend.blog',compact('blogs'));
}



         
public function show($id){
     $blog=Blog::orderBy('id','desc')->where('post_status','publish')->where('ID',$id)->first();
     $mores=Blog::where('post_status','publish')->inRandomOrder()->where('post_title','!=',null)->limit(5)->get();
       $next=Blog::where('post_status','publish')->inRandomOrder()->where('post_title','!=',null)->first();
       $prev=Blog::where('post_status','publish')->inRandomOrder()->where('post_title','!=',null)->first();

     return view('frontend.blog_detail',compact('blog','mores','next','prev'));
}








}