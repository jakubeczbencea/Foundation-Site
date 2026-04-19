<?php

namespace bootstrap;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

// cseréld a saját modelledre
// cseréld a saját policy-dra

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
