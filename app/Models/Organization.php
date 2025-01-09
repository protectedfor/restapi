<?php

namespace App\Models;

use Database\Factories\OrganizationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /** @use HasFactory<OrganizationFactory> */
    use HasFactory;

    protected $fillable = ['title', 'phones', 'building_id'];

    protected $casts = ['phones' => 'array'];

    protected $hidden = ['created_at', 'updated_at'];

    public function activities()
    {
        return $this->belongsTomany(Activity::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
