<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PexelsVideo extends Model
{
    use HasFactory;

    protected $fillable = ['video_id', 'category', 'link', 'file_type', 'width', 'height','fps', 'size', 'quality'];
}
