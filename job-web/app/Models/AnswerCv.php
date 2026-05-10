<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['experience', 'education', 'skill', 'project', 'cv_id'])]
class AnswerCv extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
}
