<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['applicant', 'open_hire', 'reject', 'employment', 'statistic_id', 'role_id'])]
class DataStatistic extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
}
