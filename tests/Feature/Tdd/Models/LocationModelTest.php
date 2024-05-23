<?php

namespace Tests\Feature\Tdd\Models;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationModelTest extends TestCase
{
//    use RefreshDatabase;


    public function testLocationModelAndFillableExists()
    {
        $this->assertTrue(class_exists(Location::class));

        $fillableAttributes = ['location_name'];
        $this->assertEquals($fillableAttributes, (new Location())->getFillable());


    }

    /** @noinspection UnknownColumnInspection
     * @noinspection PhpParamsInspection
     */
    public function testLocationHasManyProperties()
    {
        $locations = Location::all();

        foreach ($locations as $location) {
            $properties = $location->properties ?? null;

            $dbProperties = Property::query()->where('_fk_location', $location->getKey())->get();

            $this->assertCount($dbProperties->count(), $properties);

            foreach ($properties as $property) {
                $this->assertInstanceOf(Property::class, $property);
            }
        }
    }
}
