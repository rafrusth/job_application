<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Flashcard extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    public function qna(): HasOne
    {
        return $this->hasOne(Qna::class);
    }
}
