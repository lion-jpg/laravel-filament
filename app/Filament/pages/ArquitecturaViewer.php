<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ArquitecturaViewer extends Page
{
    protected static string $resource = PagesResource::class;

    protected static string $view = 'filament.pages.arquitectura-viewer';
    protected static ?string $navigationLabel = 'Arquitectura'; // Cambia el nombre que aparecerá en la navegación
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public function mount()
    {
        return redirect('admin/arqui');
    }
}
