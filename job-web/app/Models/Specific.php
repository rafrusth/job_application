<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specific extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    public $incrementing = false;
}
