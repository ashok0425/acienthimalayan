<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use File;
use Illuminate\Support\Facades\DB;
use Throwable;

class EventController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::orderBy('id','desc')->get();
       return view('admin.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.event.create');

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
            'date'=>'required',
            'end_date'=>'required',



        ]);
        // try {
       $blog=[];

            $file=$request->file('image');

            if($file){
                $fname=rand().'event.'.$file->getClientOriginalExtension();
                $blog['image']='upload/event/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/event/',$fname);
            }
            $blog['title']=$request->title;
            $blog['date']=$request->date;
            $blog['end_date']=$request->end_date;

            $blog['content']=$request->content;
           DB::table('events')->insert($blog);
          
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Event  Added',

                 );
                 return redirect()->route('admin.events.index')->with($notification);
            


        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Something went wrong. Please try again later.',

        //      );
        //      return redirect()->back()->with($notification);

        // }

    }

    public function edit(Event $event)
    {
        $event=Event::find($event->id);
        return view('admin.event.edit',compact('event'));
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
                $event=Blog::where('id',$id)->first();
                File::delete(public_path($event->image));
                $fname=rand().'event.'.$file->getClientOriginalExtension();
                $blog['guid']='upload/event/'.$fname;
                // $path=Image::make($file)->resize(200,300);
                $file->move(public_path().'/upload/event/',$fname);
            }
          
           
            $blog['title']=$request->title;
            if ($request->date) {
                $blog['date']=$request->date;

            }
           
            if ($request->end_date) {
                $blog['end_date']=$request->end_date;

            }
            $blog['content']=$request->content;
           DB::table('events')->where('id',$id)->update($blog);
          
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Event  updated',

                 );
                 return redirect()->route('admin.events.index')->with($notification);
            


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
            $destination = Event::findOrFail($id);
            File::delete($destination->image);
            $destination->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted .',
               
             );
            $this->status_message = "Successfully deleted .";
        } catch (Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete , Try again.',
               
             );
        }

        return redirect()->back()->with($notification);
    }

}
