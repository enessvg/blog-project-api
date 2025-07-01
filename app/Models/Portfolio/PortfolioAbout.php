<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'button_text',
        'button_link',
    ];
}
