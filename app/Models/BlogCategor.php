<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogCategor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable
    =[      'title',
            'slug',
            'parent_id',
            'description',
        ];

}
