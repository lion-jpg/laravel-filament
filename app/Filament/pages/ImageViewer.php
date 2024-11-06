<?php


namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ImageViewer extends Page
{
    //direccion a link guia
    protected static string $view = 'filament.pages.Image-Viewer';
    protected static ?string $navigationLabel = 'Guias Registrados'; // Cambia el nombre que aparecerá en la navegación
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    
    public function mount()
    {   
        // Verifica si el usuario está autenticado
        if (!auth()->check()) {
            // dd(auth()->user()) ;
            return redirect()->route('login'); // Redirige a la página de inicio de sesión
        }
        
        $user = auth()->user();
        // dd($user->roles->pluck('name'));

         
    
        // if (!ImageViwerPolicy(static::class)->view(auth()->user())) {
        //     abort(403); // Acceso denegado
        // }
        return redirect('admin/guia');
    
}}