<?php

namespace App\Http\Controllers\Api\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Resources\Portfolio\BannerResource;
use App\Services\Portfolio\BannerService;
use App\Traits\ApiResponserTrait;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use ApiResponserTrait;
    protected $service;

    public function __construct(BannerService $bannerService)
    {
        $this->service = $bannerService;
    }


    public function index(){
        $data = $this->service->index();

        if(empty($data)) {
            return $this->errorResponse('No banners found', 404);
        }
        return $this->successResponse(new BannerResource($data), 'Banner retrieved successfully', 200);
    }
}
