<?php

namespace App\Services\Portfolio;

use App\Models\Portfolio\PortfolioProject;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectService
{
    public function index(){
        $data = PortfolioProject::query()->where('status', 1)->orderBy('sort', 'asc')->get();
        return $data;
    }
}
