<?php

namespace App\Providers;

use App\Models\Post;  // cseréld a saját modelledre
use App\Policies\PostPolicy;  // cseréld a saját policy-dra
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     */
    protected $policies = [
        Post::class => PostPolicy::class,  // itt regisztráld: Model => Policy
        // pl. User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Opcionális: Gates itt is definiálhatók
        // Gate::define('edit-post', function (User $user, Post $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}
