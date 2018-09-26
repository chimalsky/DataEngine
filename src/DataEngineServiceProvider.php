<?php
namespace App\DataEngine;
use Illuminate\Support\ServiceProvider;

class DataEngineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/database/migrations/create_data_table.php' => database_path('migrations/'.$timestamp.'_create_data_table.php'),
                __DIR__.'/database/migrations/create_form_columns_table.php' => database_path('migrations/'.$timestamp.'_create_form_columns_table.php'),
                __DIR__.'/database/migrations/create_form_responses_table.php' => database_path('migrations/'.$timestamp.'_create_form_responses_table.php'),
                __DIR__.'/database/migrations/create_forms_table.php' => database_path('migrations/'.$timestamp.'_create_forms_table.php'),
                __DIR__.'/database/migrations/create_projects_table.php' => database_path('migrations/'.$timestamp.'_create_projects_table.php'),
                __DIR__.'/database/migrations/create_users_table.php' => database_path('migrations/'.$timestamp.'_create_users_table.php'),
            ], 'migrations');
        }
    }
    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
