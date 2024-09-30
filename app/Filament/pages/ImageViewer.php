<?php


namespace App\Filament\Pages;

use Filament\Pages\Page;

class ImageViewer extends Page
{
    //direccion a link guia
    protected static string $view = 'filament.pages.Guias-Registrados';
    protected static ?string $navigationLabel = 'Guias Registrados'; // Cambia el nombre que aparecerá en la navegación
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    
    public function mount()
    {   
        return redirect('admin/guia');
    }
}
