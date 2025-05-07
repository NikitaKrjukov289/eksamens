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
   
     *
     * @var array
     */
    protected $policies = [
        Trenins::class => AdminPolicy::class, 
        Treners::class => AdminPolicy::class, 
    ];

    /**
     *
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       
    }
}


