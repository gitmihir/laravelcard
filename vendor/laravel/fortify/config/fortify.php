<?php

use Laravel\Fortify\Features;

return [
    'guard' => 'web',
    'middleware' => ['web'],
    'auth_middleware' => 'auth',
    'passwords' => [
        'password_reset' => [
            'broker' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
            'redirect' => '/login',
        ],
    ],
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => '/home',
    'prefix' => '',
    'domain' => null,
    'limiters' => [
        'login' => null,
    ],
    'paths' => [
        'login' => null,
        'logout' => null,
        'password.request' => null,
        'password.reset' => null,
        'password.email' => null,
        'password.update' => null,
        'register' => null,
        'verification.notice' => null,
        'verification.verify' => null,
        'verification.send' => null,
        'user-profile-information.update' => null,
        'user-password.update' => null,
        'password.confirm' => null,
        'password.confirmation' => null,
        'two-factor.login' => null,
        'two-factor.enable' => null,
        'two-factor.confirm' => null,
        'two-factor.disable' => null,
        'two-factor.qr-code' => null,
        'two-factor.secret-key' => null,
        'two-factor.recovery-codes' => null,
    ],
    'redirects' => [
        'login' => null,
        'logout' => null,
        'password-confirmation' => null,
        'register' => null,
        'email-verification' => null,
        'password-reset' => null,
    ],
    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::emailVerification(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication(),
    ],

];