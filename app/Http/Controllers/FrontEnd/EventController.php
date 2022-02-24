<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{

public function index(){
     $events=Event::orderBy('id','desc')->where('status',1)->where('title','!=',null)->paginate(12);
     return view('frontend.event',compact('events'));
}



         
public function show($id){
     $event=Event::orderBy('id','desc')->where('status',1)->where('id',$id)->first();
     $mores=Event::where('status',1)->inRandomOrder()->where('title','!=',null)->limit(5)->get();
       $next=Event::where('status',1)->inRandomOrder()->where('title','!=',null)->first();
       $prev=Event::where('status',1)->inRandomOrder()->where('title','!=',null)->first();

     return view('frontend.event_view',compact('event','mores','next','prev'));
}








}