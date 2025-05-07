<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Trenins;
use App\Models\Treners;
use App\Policies\TreninsPolicy;
use App\Policies\TrenersPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
   
     *
     * @var array
     */
    protected $policies = [
        \App\Models\Trenins::class => \App\Policies\TreninsPolicy::class,
        \App\Models\Treners::class => \App\Policies\TrenersPolicy::class,
        Comment::class => CommentPolicy::class,
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


