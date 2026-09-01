<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
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
        Carbon::setLocale('id');
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $contact    = \App\Models\Contact::latest()->first();
            $pmbSetting = \App\Models\PmbSetting::first();
            $cleanWa    = '';
            if ($contact && !empty($contact->no_wa)) {
                $cleanWa = preg_replace('/[^0-9]/', '', $contact->no_wa);
                if (strpos($cleanWa, '08') === 0) {
                    $cleanWa = '628' . substr($cleanWa, 2);
                }
            }
            $view->with([
                'contact'    => $contact,
                'cleanWa'    => $cleanWa,
                'pmbSetting' => $pmbSetting,
            ]);
        });
    }
}
