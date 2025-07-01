<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
    ];
}
