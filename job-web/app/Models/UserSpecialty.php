<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'role_id'])]
class UserSpecialty extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
}
