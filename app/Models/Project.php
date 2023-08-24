<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects';

    protected $fillable = [
        'project_name',
        'image',
        'owner',
        'room',
        'price',
        'acreage',
        'address',
        'detail',
        'author_id',
        'type_id',
        'status',
    ];
}
