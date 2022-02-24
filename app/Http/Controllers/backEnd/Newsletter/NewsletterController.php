<?php

namespace App\Http\Controllers\BackEnd\Newsletter;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Newsletter;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\subscribeemail;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters=Newsletter::orderBy('created_at','desc')->get();
        return view('admin.newsletter.index',compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'email'=>'required'
        ]);
        $email=[];
        foreach ($request->email as  $value) {
          $email[]=$value;
        }
        return view('admin.newsletter.create',compact('email'));

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
            //code...
         $mail=new Email;
         $mail->title=$request->title;
         $mail->email=$request->details;
         $file=$request->file('file');
 
         if($file){
             $fname=rand().'email.'.$file->getClientOriginalExtension();
             $mail->image='upload/email/subscriber/'.$fname;
             // $path=Image::make($file)->resize(200,300);
             $file->move(public_path().'/upload/email/subscriber/',$fname);
                 }
           $mail->save();
             $emailId=$mail->id;
         foreach ($request->email as $value) {
             $id=Newsletter::where('email',$value)->value('id');
             $subemail=new subscribeemail;
             $subemail->subscribe_id=$id;
             $subemail->email_id=$emailId;
             $subemail->save();
             $set=[
                 'email'=>$value,
                 'title'=>$request->title,
                 'emailId'=>$emailId,
 
 
             ];
     
 
            Mail::send('mail.subscriberemail', $set, function($message)use($set) {
        $message->to($set['email'])
                ->subject($set['title']);
    });
 
         }
         $notification=array(
             'alert-type'=>'success',
             'messege'=>'Email Sent successfully',
            
          );
         return redirect()->route('admin.newsletters.index')->with($notification);
     } catch (\Throwable $th) {
         $notification=array(
             'alert-type'=>'error',
             'messege'=>'Something went wrong.Try again later.',
            
          );
         return redirect()->route('admin.newsletters.index')->with($notification);
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $email=Email::find($id);
       return view('admin.newsletter.show',compact('email'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email=Email::orderBy('id','desc')->get();
        return view('admin.newsletter.history',compact('email'));
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $newsletters=Newsletter::destroy($id);
         $notification=array(
            'alert-type'=>'success',
            'messege'=>'Newsletter Email Deleted.',
           
         );
        return redirect()->back()->with($notification);
    }





public function emailHistory(){
    $email=Email::orderBy('id','desc')->get();
        return view('admin.newsletter.history',compact('email'));
        
}
    
}