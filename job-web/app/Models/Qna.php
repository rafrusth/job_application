<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['question', 'answer', 'type'])]
class Qna extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    public $incrementing = false;

}
