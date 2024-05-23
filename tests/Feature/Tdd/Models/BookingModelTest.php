<?php

namespace Tests\Feature\Tdd\Models;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingModelTest extends TestCase
{
//    use RefreshDatabase;

    public function testBookingModelAndFillableExists()
    {
        $this->assertTrue(class_exists(Booking::class));

        $fillableAttributes = ['_fk_property', 'start_date', 'end_date'];
        $this->assertEquals($fillableAttributes, (new Booking())->getFillable());

    }

    /** @noinspection UnknownColumnInspection */
    public function testBookingBelongsToProperty()
    {
        $property = Property::first();
        $booking = Booking::query()->where('_fk_property', $property->getKey())->first();

        $retrievedProperty = $booking->property ?? null;

        $this->assertInstanceOf(Property::class, $retrievedProperty);
        $this->assertEquals($property->getKey(), $retrievedProperty->getKey());
    }
}
