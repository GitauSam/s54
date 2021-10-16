<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        "status",
        "message",
        "winning_numbers"
    ];
}
