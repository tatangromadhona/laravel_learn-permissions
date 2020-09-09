<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    
    protected $fillable = [
        'title','author','image','description',
        'language','publisher','published'
    ];

    protected $casts = [
        'created_at'=>'datetime:Y-m-d H-m-s',
        'updated_at'=>'datetime:Y-m-d H-m-s'
    ];
}
