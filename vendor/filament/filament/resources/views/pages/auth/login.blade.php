
<div class="content">
    <div class="custom-background">
        <x-filament-panels::page.simple>

            @if (filament()->hasRegistration())
            <x-slot name="subheading">
                {{ __('filament-panels::pages/auth/login.actions.register.before') }}

                {{ $this->registerAction }}
            </x-slot>
            @endif

            {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.before') }}
            <div class="filament-login-page">
                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <x-filament-panels::form.actions :actions="$this->getCachedFormActions()"
                        :full-width="$this->hasFullWidthFormActions()" />
                </x-filament-panels::form>
            </div>


            {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.after') }}
        </x-filament-panels::page.simple>
    </div>
</div>


<style>
.content {
    position: relative;
    /* Necesario para el pseudo-elemento */
    background-image: url('{{ asset('storage/boot.jpg') }}');
    /* Reemplaza con la ruta de tu imagen */
    background-size: cover;
    /* Ajusta la imagen para cubrir todo el contenedor */
    background-position: center;
    /* Centra la imagen */
    height: 65vh;
    /* Altura del contenedor */
    display: flex;
    /* Para centrar el contenido */
    justify-content: center;
    /* Centrar horizontalmente */
    align-items: center;
    /* Centrar verticalmente */
    border-radius: 15px;
    border: 5px solid white;
    box-shadow: 0 0 20px rgba(0255, 0255, 225, 0.8); /* Ajusta los valores según tus preferencias */
   }

.content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 15px;
    background-color: rgba(0, 0, 0, 0.5);
    /* Sombra oscura con opacidad */
    z-index: 0;
    /* Detrás del contenido */
}

.filament-login-page {
    position: relative;
    /* Asegura que esté en frente */
    z-index: 1;
    /* Asegura que el contenido esté encima del sombreado */

}
.custom-background{
    position: relative;
    /* Asegura que esté en frente */
    z-index: 1;
    /* Asegura que el contenido esté encima del sombreado */
}

</style>