<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Article extends Model
{
    use HasFactory;


     function users()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }

    function user()
    {
      return $this->belongsToMany(User::class,'article_user','article_id','user_id')->withPivot(['created_at','random_num']);
    }

    // protected static function boot(){
    //   parent::boot();
    //   static::created( function ($user)
    //   {
    //     dd($user);
    //   });
    // }
}
