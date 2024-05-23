<?php

namespace Tests\Feature\Tdd\Controllers;

use App\Models\Property;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{

    public function test_search_query()
    {
        $response = Property::query()->where(function($builder) {
            $availableDate = '2020-08-25';

            $builder->whereHas('location', function($query) {
                $query->where('location_name', 'like', '%Cornwall%')
                      ->orWhere('location_name', 'Cornwall');
            });
            $builder->whereDoesntHave('bookings', function($query) use ($availableDate) {
                $query->where('start_date', '<=', $availableDate)
                    ->where('end_date', '>=', $availableDate);
            });

            $builder->where('near_beach', 1);
            $builder->where('accepts_pets', 1);
            $builder->where('sleeps', '>=', 2);
            $builder->where('beds', '>=', 2);
        })->get();


        $this->assertNotEmpty($response);

    }

    public function test_show_method_to_display_property_details()
    {
        /** @var Property $property */
        $property = Property::query()->first();


        $response = $this->get(route('front.show', $property));

        $response->assertStatus(200)
            ->assertSee($property->property_name)
            ->assertSee($property->location->location_name);

    }
}
