<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataPageTest extends TestCase
{
    /**
     * A basic test for correct opening of the data page.
     *
     * @return void
     */
    public function testDataPage()
    {
        $response = $this->get('/data');

        $response->assertStatus(200);
    }
}
