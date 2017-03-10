<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NominationControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateNomination()
    {
        $response = $this->get(route('nomination.create'));

        $this->assertContains('Nominate Someone!', $response->content());
    }

    public function testSubmitNomination()
    {

    }
}
