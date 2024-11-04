<?php

namespace App\Services;

use App\Repositories\SiteSettingRepository;

class SiteSettingsService
{

    protected $siteSettingsRepository;

    public function __construct(SiteSettingRepository $siteSettingsRepository)
    {
        $this->siteSettingsRepository = $siteSettingsRepository;
    }

    public function getAll()
    {
        return $this->siteSettingsRepository->getAll();
    }

}
