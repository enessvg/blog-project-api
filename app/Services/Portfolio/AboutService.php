<?php

namespace App\Services\Portfolio;

use App\Models\Portfolio\PortfolioAbout;

class AboutService
{
    public function index(){
        $data = PortfolioAbout::query()->first();
        
        return $data;
    }
}
