<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    use HasFactory;
    protected $fillable = ['title','publication_year','author','number','description','cover_file_name','original_cover_file_name','sumOfrate','numberOfrate'];

    public function us_comments()
    {
        return $this->belongsToMany('App\Models\user','comments','book_id','user_id')->withpivot('description','id');
    }
    public function rate()
    {
        return $this->belongsToMany('App\Models\user','rates','book_id','user_id')->withpivot('rate_num','id');
    }
     
}
