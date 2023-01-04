<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StackModel extends Model
{
    use HasFactory;
    protected $table = 'stacks';
    protected $fillable = [ 
        'stack', 
        'url',
    ];
}
