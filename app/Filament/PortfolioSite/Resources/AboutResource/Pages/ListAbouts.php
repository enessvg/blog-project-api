<?php

namespace App\Filament\PortfolioSite\Resources\AboutResource\Pages;

use App\Filament\PortfolioSite\Resources\AboutResource;
use App\Models\Portfolio\PortfolioAbout;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    protected function getHeaderActions(): array
    {
        if(PortfolioAbout::count() >= 1){
            return [];
        }
        
        return [
            Actions\CreateAction::make(),
        ];
    }
}
