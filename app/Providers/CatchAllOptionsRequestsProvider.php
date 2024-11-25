<?php 

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Routing\Router;

class CatchAllOptionsRequestsProvider extends ServiceProvider {

    public function boot(Router $router)
    {
        // Menangani semua permintaan OPTIONS untuk semua rute
        $router->options('{any:.*}', function() {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Credentials', 'true' )
                ->header('Access-Control-Max-Age', '86400')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        });
    }

    public function register()
    {
        // Tidak perlu melakukan apa-apa di sini untuk menangani OPTIONS
    }
}