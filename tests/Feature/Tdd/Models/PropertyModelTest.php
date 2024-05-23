<?php

namespace Tests\Feature\Tdd\Models;

use App\Models\Booking;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyModelTest extends TestCase
{
//    use RefreshDatabase;

    public function testPropertyModelAndFillableExists()
    {
        $this->assertTrue(class_exists(Property::class));

        $fillableAttributes = ['_fk_location', 'property_name', 'near_beach', 'accepts_pets', 'sleeps', 'beds'];
        $this->assertEquals($fillableAttributes, (new Property())->getFillable());
    }

    /** @noinspection UnknownColumnInspection */
    public function testPropertyBelongsToLocation()
    {
        $location = Location::first();
        $property = Property::query()->where('_fk_location', $location->getKey())->first();

        $retrievedLocation = $property->location ?? null;

        $this->assertInstanceOf(Location::class, $retrievedLocation);
        $this->assertEquals($location->getKey(), $retrievedLocation->getKey());
    }

    /** @noinspection UnknownColumnInspection
     * @noinspection PhpParamsInspection
     */
    public function testPropertyHasManyBookings()
    {
        $properties = Property::all();

        foreach ($properties as $property) {
            $bookings = $property->bookings;

            $dbBookings = Booking::query()->where('_fk_property', $property->getKey())->get();

            $this->assertCount($dbBookings->count(), $bookings);

            foreach ($bookings as $booking) {
                $this->assertInstanceOf(Booking::class, $booking);
            }
        }
    }

}
