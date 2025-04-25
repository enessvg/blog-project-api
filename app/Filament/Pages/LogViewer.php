<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class LogViewer extends Page
{
    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.log-viewer';
  
  protected static ?string $navigationGroup = "Admin";
  protected static ?int $navigationSort = 60;
  
  public $logContent;

    public function mount()
    {
        $logPath = storage_path("logs/laravel.log");

        if (file_exists($logPath)) {
            $this->logContent = file_get_contents($logPath);
        } else {
            $this->logContent = 'Log dosyası bulunamadı.';
        }
    }
}
