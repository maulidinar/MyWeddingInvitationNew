<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permition extends Model
{
    use HasFactory;
    protected $table = 'role_area_permission';
    protected $fillable = ['role_id','area_id'];

     /**
     * Set the area_id
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['area_id'] = json_encode($value);
    }
  
    /**
     * Get the area_id
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['area_id'] = json_decode($value);
    }
}
