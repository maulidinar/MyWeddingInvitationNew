<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    use HasFactory;
    protected $fillable = [
        'badge_name','image','role_id','badge_code'
    ];
}
