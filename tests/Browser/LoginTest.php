<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->clickLink('Acceder')
                    ->clickLink('Login')
                    ->type('email', 'anthonyansoni24@gmail.com')
                    ->type('password', 'invalida')
                    ->press('INGRESAR')
                    ->assertSee('Estas credenciales no coinciden con nuestros registros.')
                    ->type('password', '5987964')
                    ->press('INGRESAR')
                    ->assertPathIs('/dashboard');
        });
    }
}
