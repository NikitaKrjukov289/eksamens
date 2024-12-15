<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Trenins;
use App\Models\Treners;
use App\Policies\AdminPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Политики для авторизации.
     *
     * @var array
     */
    protected $policies = [
        Trenins::class => AdminPolicy::class, 
        Treners::class => AdminPolicy::class, 
    ];

    /**
     * Запуск провайдера услуг.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Другие регистрации, если нужны
    }
}


