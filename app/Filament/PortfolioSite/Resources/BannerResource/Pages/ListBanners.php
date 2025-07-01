<?php

namespace App\Filament\PortfolioSite\Resources\BannerResource\Pages;

use App\Filament\PortfolioSite\Resources\BannerResource;
use App\Models\Portfolio\PortfolioBanner;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBanners extends ListRecords
{
    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        if(PortfolioBanner::count() >= 1){
            return [];
        }
        
        return [
            Actions\CreateAction::make(),
        ];
    }
}
