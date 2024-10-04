<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const STATE_ACTIVE = 1;

    const STATE_INACTIVE = 0;

    protected $fillable =['name', 'state'];
}
