<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrow extends Model
{
    use HasFactory;
    protected $fillable = ['book_id','user_id','answer','user_borrowed_at','user_refunds_at'];
   
}
