<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Page;
use App\Models\Website;
use File;
use App\Http\Traits\status;
use App\Models\Payment_type;

class SettingController extends Controller
{
    use status;

  



    public function index(){
        $website=Website::find(1);
        return view('admin.setting.website',compact('website'));
    }

    public function create(){

    }

    public function store(Request $request){
        $web=Website::find(1);
        $file=$request->file('file');

        if($file){
            File::delete(public_path($web->image));
            $fname=rand().'seeting.'.$file->getClientOriginalExtension();
            $web->image='upload/setting/logo/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $file->move(public_path().'/upload/setting/logo/',$fname);
                }

                $fev=$request->file('fev');

        if($fev){
            File::delete(public_path($web->fev));
            $fname=rand().'fev.'.$fev->getClientOriginalExtension();
            $web->fev='upload/setting/fev/'.$fname;
            // $path=Image::make($file)->resize(200,300);
            $fev->move(public_path().'/upload/setting/fev/',$fname);
                }

                $web->title=$request->title;
                $web->keyword=$request->keyword;
                $web->descr=$request->descr;
                $web->email=$request->email;
                $web->phone=$request->phone;
                $web->address=$request->address;
                $web->email3=$request->email3;
                $web->email2=$request->email2;
                $web->phone2=$request->phone2;
                $web->address2=$request->address2;
                $web->expert_phone1=$request->expert_phone1;
                $web->expert_phone2=$request->expert_phone2;
                $web->longitude=$request->longitude;
                $web->latitude=$request->latitude;

                $web->url=$request->url;
                $web->facebook=$request->facebook;
                $web->twitter=$request->twitter;
                $web->instagram=$request->instagram;
                $web->youtube=$request->youtube;
                $web->pinterest=$request->pinterest;
                $web->linkdin=$request->linkdin;
                $web->copy_right=$request->copy_right;

        $web->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'website setting updated',

        );
 return redirect()->back()->with($notification);
    }





}
