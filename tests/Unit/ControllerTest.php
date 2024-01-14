<?php

namespace Tests\Unit;

use Tests\TestCase;

class ControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_pollenUnitPost(): void
    {
        $repository =$this->app->make(\App\Models\announced_pu_results::class);
        $payload = [
            'result_id'=> 30,
            'polling_unit_uniqueid' => 8,
            'party_abbreviation' => 'PDP',
            'party_score' => 200,
        ];
        $result = $repository->create(['result_id'=> 30,
        'polling_unit_uniqueid' => 8,
        'party_abbreviation' => 'PDP',
        'party_score' => 200,
        'entered_by_user' => 'string',
        'date_entered'=> '2011-04-26 15:44:03',
        'user_ip_address' => '192.168.1.101',
    ]);
        $this->assertSame($payload['result_id'],$result->result_id,'the value created are not the same');
    }
}
