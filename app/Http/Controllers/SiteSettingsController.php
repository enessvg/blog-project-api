<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiteSettingsResource;
use App\Models\Kvkk;
use App\Models\Privacy_policy;
use App\Services\SiteSettingsService;
use App\Traits\ApiResponserTrait;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    use ApiResponserTrait;

    protected $siteSettingsService;

    public function __construct(SiteSettingsService $siteSettingsService)
    {
        $this->siteSettingsService = $siteSettingsService;
    }

    public function index(){
        $siteSettings = $this->siteSettingsService->getAll();

        return $this->successResponse([
            'site_settings' => new SiteSettingsResource($siteSettings),
        ], 'Successful listing of all site settings');
    }
}
