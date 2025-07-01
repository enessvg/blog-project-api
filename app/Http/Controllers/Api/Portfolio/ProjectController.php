<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Resources\Portfolio\ProjectResource;
use App\Services\Portfolio\ProjectService;
use App\Traits\ApiResponserTrait;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use ApiResponserTrait;
    protected $service;

    public function __construct(ProjectService $projectService)
    {
        $this->service = $projectService;
    }


    public function index(){
        $data = $this->service->index();

        return $this->successResponse(ProjectResource::collection($data), 'Projects retrieved successfully', 200);
    }
}
