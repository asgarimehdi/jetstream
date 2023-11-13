<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region_centers extends Model
{
    use HasFactory;
    public function region_points()
    {
        return $this->hasMany(Region_points::class);
    }
    public function region_county()
    {
        return $this->belongsTo(Region_counties::class,'county_id','id');
    }
    protected $fillable = [
        'name', 'id','type_id','county_id',
    ];
}
