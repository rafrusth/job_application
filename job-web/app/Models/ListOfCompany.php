<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['data_statistic_id', 'company_id'])]
class ListOfCompany extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;
}
