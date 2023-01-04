<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkModel extends Model
{
    use HasFactory;
    protected $table = 'works';
    protected $fillable = [ 
        'title', 
        'desc',
        'url',
        'image_url',
        'image_uri',
        'isClicked',
        'isShowing'
    ];
}
