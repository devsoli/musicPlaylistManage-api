<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'name',
        'singer',
        'image',
        'spotifyUrl'
    ];
    use HasFactory;
}
