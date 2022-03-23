<?php

namespace Tests\Feature;

use Tests\BaseTest;

class MainControllerTest extends BaseTest
{
    /** @test */
    public function it_should_return_main_page()
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee(config('app.name'));
    }
}
