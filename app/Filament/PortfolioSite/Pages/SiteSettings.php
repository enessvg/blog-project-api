<?php

namespace App\Filament\PortfolioSite\Pages;

use App\Models\PortfolioSiteSetting;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class SiteSettings extends Page
{
    use InteractsWithForms;
  
  	use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $view = 'filament.portfolio-site.pages.site-settings';

    protected static ?string $navigationGroup = 'Setting';

    public ?PortfolioSiteSetting $settings = null;

    public ?array $data = [];

    public function mount(): void
    {
        // İlk ayar kaydını al ve formu doldur
        $this->settings = PortfolioSiteSetting::first();

        // Eğer ayar varsa, formu doldur
        $this->form->fill($this->settings ? $this->settings->toArray() : []);
    }

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title'),
            FileUpload::make('favicon'),
            FileUpload::make('icon'),
            MarkdownEditor::make('description'),
            TagsInput::make('keywords'),
        ])->statePath('data');
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                // ->label(__('filament-panels::resources/pages/settings.form.actions.save.label'))
                ->submit('save'),
        ];
    }
    public function save(): void
    {
        try {
            $data = $this->form->getState();

            // İlk ayar kaydını al ve güncelle
            $setting = PortfolioSiteSetting::first();

            if ($setting) {
                $setting->update($data);
            } else {
                // Eğer ayar kaydı yoksa yeni bir kayıt oluştur
                PortfolioSiteSetting::create($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Success')
            ->send();
    }
}
