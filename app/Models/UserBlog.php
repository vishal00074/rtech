<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBlog extends Model
{
    use HasFactory;

    protected $fillable =['user_id','title', 'description', 'description2', 'image', 'secondary_images', 'category_id'];
}
