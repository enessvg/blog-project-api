<?php

namespace App\Filament\PortfolioSite\Resources\PortfolioProjectResource\Pages;

use App\Filament\PortfolioSite\Resources\PortfolioProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioProjects extends ListRecords
{
    protected static string $resource = PortfolioProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
