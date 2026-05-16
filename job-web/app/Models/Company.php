<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'website', 'contact'])]
class Company extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    public function cities()
    {
        return $this->belongsToMany(City::class, 'location_companies');
    }
}
