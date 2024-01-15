<?php

namespace Tests\Feature;
use Throwable;

//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {   
        $input = \App\Models\states::factory(1)->make();
        $response = $this->get('/api/test');
        $response->ddHeaders();
    }
}
