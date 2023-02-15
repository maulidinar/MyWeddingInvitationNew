<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataModels extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = [
        'agency_id',
        'model_name',
        'picture',
        'age',
        'height',
        'weight',
        'origin',
        'city',
        'email',
        'ktp',
        'experience',
        'online_audition',
        
    ];
}
