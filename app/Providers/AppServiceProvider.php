<?php

namespace App\Providers;

use App\Models\Profil;
use Illuminate\Support\Facades\View;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $profils = Profil::select('title', 'slug')->where('status', true)->get();
            $view->with('profils', $profils);
        });

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Berita Kabar UKKI',
                'Agenda',
                'Kepanitiaan',
                'Peta Jaringan',
                'Data Kepengurusan',
                'Setting'

            ]);
        });
    }
}
