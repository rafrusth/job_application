<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['role_id', 'specific_id'])]
class RoleBasedQna extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
}
