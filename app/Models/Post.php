<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeLetes;

class Post extends Model
{
    use HasFactory;
    use SoftDeLetes;

    //protected $fillable = ['Posts'];
    protected $table = 'posts';
    public $timestamps = false;
}
