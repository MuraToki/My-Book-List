<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //テーブル名
    protected $table = 'books';

    //可変項目
    protected $fillable = [
        'title',
        'content'
    ];

}
