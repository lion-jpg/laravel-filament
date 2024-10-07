<?php


namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ImageViewer extends Page
{
    //direccion a link guia
    protected static string $view = 'filament.pages.Guias-Registrados';
    protected static ?string $navigationLabel = 'Guias Registrados'; // Cambia el nombre que aparecerá en la navegación
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    
    public function mount()
    {   
        if (!auth()->user() || !policy(static::class)->view(auth()->user())) {
            abort(403); // Acceso denegado
        }
        return redirect('admin/guia');
    }
}
