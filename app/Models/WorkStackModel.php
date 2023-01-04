<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStackModel extends Model
{
    use HasFactory;
    protected $table = 'work_stack';
    protected $fillable = [ 
        'stack_id', 
        'url_id',
    ];
}
