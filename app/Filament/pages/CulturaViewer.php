<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CulturaViewer extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-americas';
    protected static ?string $navigationLabel = 'Culturas';
    protected static string $view = 'filament.pages.cultura-viewer';

    public function mount()
    {
        return redirect('admin/culturas');
    }
}
