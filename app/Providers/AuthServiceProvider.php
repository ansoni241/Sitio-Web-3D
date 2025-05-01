<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User; // Importa el modelo User
use App\Policies\AdminPolicy; // Importa la política AdminPolicy

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => AdminPolicy::class, // Registra la política
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define el Gate para autorizar el acceso
        Gate::define('view-admin-options', [AdminPolicy::class, 'viewAdminOptions']);

        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->subject(Lang::get('Verify Email Address'))
                ->line(Lang::get('Please click the button below to verify your email address.'))
                ->action(Lang::get('Verify Email Address'), $url)
                ->line(Lang::get('If you did not create an account, no further action is required.'))
                ->salutation('Muchas gracias!');
        });
    }
}
