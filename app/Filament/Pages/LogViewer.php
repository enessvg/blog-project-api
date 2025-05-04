<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

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
        $this->loadLog();
    }

    protected function loadLog()
    {
        $logPath = storage_path("logs/laravel.log");

        if (file_exists($logPath)) {
            $this->logContent = file_get_contents($logPath);
        } else {
            $this->logContent = 'Log dosyası bulunamadı.';
        }
    }

    public function clearLog()
    {
        $logPath = storage_path("logs/laravel.log");

        if (file_exists($logPath)) {
            file_put_contents($logPath, ''); // log dosyasını boşalt
            $this->loadLog(); // içeriği yeniden yükle

            Notification::make()
                ->title('Log dosyası temizlendi.')
                ->success()
                ->send();
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('clearLog')
                ->label('Logları Temizle')
                ->color('danger')
                ->action('clearLog')
                ->requiresConfirmation()
                ->icon('heroicon-o-trash'),
        ];
    }
}
