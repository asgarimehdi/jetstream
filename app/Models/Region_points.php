<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region_points extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function region_center()
    {
        return $this->belongsTo(Region_centers::class,'center_id','id');
    }

    protected $fillable = [
        'name', 'id','center_id','lat','lng','type_id','point_id'
    ];
}
