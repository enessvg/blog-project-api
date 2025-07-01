<?php

namespace App\Services\Portfolio;

use App\Models\Portfolio\PortfolioBanner;

class BannerService
{
    public function index(){
        $data = PortfolioBanner::query()->first();
        
        return $data;
    }
}
