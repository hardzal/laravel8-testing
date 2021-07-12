<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AplhaTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/alpha')
                    ->assertSee('Alpha')
                    ->clickLink('Next')
                    ->assertPathIs('/beta');
        });
    }
}
