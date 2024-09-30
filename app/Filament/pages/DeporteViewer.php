<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class DeporteViewer extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-lifebuoy';
    protected static ?string $navigationLabel = 'Deportes';
    protected static string $view = 'filament.pages.deporte-viewer';

    public function mount()
    {
        return redirect('admin/deportes');
    }
}
