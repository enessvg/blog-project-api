<?php

namespace App\Filament\PortfolioSite\Resources\PortfolioContactResource\Pages;

use App\Filament\PortfolioSite\Resources\PortfolioContactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortfolioContacts extends ListRecords
{
    protected static string $resource = PortfolioContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
