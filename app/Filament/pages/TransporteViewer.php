<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class TransporteViewer extends Page
{
    
    protected static string $view = 'filament.pages.transporte-viewer';
    protected static ?string $navigationLabel = 'Transporte'; // Cambia el nombre que aparecerá en la navegación
    protected static ?string $navigationIcon = 'heroicon-o-truck';

    public function mount()
    {
        return redirect('/transportes');
    }
}
