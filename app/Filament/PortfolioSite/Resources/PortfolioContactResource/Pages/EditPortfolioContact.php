<?php

namespace App\Filament\PortfolioSite\Resources\PortfolioContactResource\Pages;

use App\Filament\PortfolioSite\Resources\PortfolioContactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortfolioContact extends EditRecord
{
    protected static string $resource = PortfolioContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
