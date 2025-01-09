<?php

namespace App\Models;

use Database\Factories\BuildingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Building extends Model
{
    /** @use HasFactory<BuildingFactory> */
    use HasFactory, HasSpatial;

    protected $fillable = ['address', 'coordinates'];

    protected $casts = ['coordinates' => Point::class];

    protected $hidden = ['created_at', 'updated_at'];

    public function organizations()
    {
        return $this->hasMany(Organization::class);
    }
}
