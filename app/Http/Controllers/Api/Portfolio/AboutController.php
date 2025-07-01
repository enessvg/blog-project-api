<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Resources\Portfolio\AboutResource;
use App\Services\Portfolio\AboutService;
use App\Traits\ApiResponserTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use ApiResponserTrait;
    protected $service;

    public function __construct(AboutService $aboutService)
    {
        $this->service = $aboutService;
    }


    public function index(){
        $data = $this->service->index();

        if(empty($data)) {
            return $this->errorResponse('No about found', 404);
        }

        return $this->successResponse(new AboutResource($data), 'About retrieved successfully', 200);
    }
}
