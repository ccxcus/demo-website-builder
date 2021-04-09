<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'title',
        'description',
        'body',
        'styles',
        'user_id',
    ];
}
