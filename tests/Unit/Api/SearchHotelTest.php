<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchHotelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSearchHotelAvailability()
    {
        $header = ['content-type'  => 'application/json'];
        $payload = [
            'start_date'    =>  '2019-06-11',
            'end_date'      =>  '2019-06-13',
            'type'          =>  2
        ];
        $query = http_build_query($payload);

        $this->json('GET', '/api/room/search?'.$query, [], $header)
             ->assertStatus(200)
             ->assertJsonStructure([
                 ['id',
                 'name',
                 'hotel',
                 'type',
                 'capacity',
                 'image',
                 'created_at',
                 'created_at']
             ]);
    }

    public function testSearchInvalidStartDateAndEndDate(){

        $header = ['content-type'  => 'application/json'];
        $payload = ['type' =>  2];
 
        $query = http_build_query($payload);

        $this->json('GET', '/api/room/search?'.$query, [], $header)
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.',
                'errors'    =>  [
                    'start_date' => ['The start date field is required.'],
                    'end_date'  =>  ['The end date field is required.']
                ]
             ]);    
    }

    public function testSearchInvalidRoomType(){

        $header = ['content-type'  => 'application/json'];
        $payload = [
            'start_date'    =>  '2019-06-11',
            'end_date'      =>  '2019-06-13',
        ];
 
        $query = http_build_query($payload);

        $this->json('GET', '/api/room/search?'.$query, [], $header)
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.',
                'errors'    =>  [
                    'type' => ['The type field is required.']
                ]
             ]);    
    }    
}
