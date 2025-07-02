<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
