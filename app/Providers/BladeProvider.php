<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BladeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('recaptcha',function(){
            return `
            <script script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
            <div class="g-recaptcha <?php @error('g-recaptcha-response') ?>  is-invalid @enderror" data-sitekey="{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}"></div>
           
            `;
        });
    }
}
