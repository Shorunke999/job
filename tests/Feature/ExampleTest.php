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
    {   $data_value = [
        'result_id'=>30
    ];
        $id = 30;
        $response = $this->get('/api/test/'.$id)->json('data');
        $response->assertSame();
    }
}
