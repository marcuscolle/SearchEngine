<?php

namespace Tests\Feature\Tdd\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTest extends TestCase
{
//    use RefreshDatabase;

    public function test_if_locations_table_schema_and_columns_are_correct()
    {
        $this->assertTrue(Schema::hasTable('locations'));
        $this->assertTrue(Schema::hasColumn('locations', '__pk'));
        $this->assertTrue(Schema::hasColumn('locations', 'location_name'));
    }

    public function test_if_properties_table_schema_and_columns_are_correct()
    {
        $this->assertTrue(Schema::hasTable('properties'));
        $this->assertTrue(Schema::hasColumn('properties', '__pk'));
        $this->assertTrue(Schema::hasColumn('properties', '_fk_location'));
        $this->assertTrue(Schema::hasColumn('properties', 'property_name'));
        $this->assertTrue(Schema::hasColumn('properties', 'near_beach'));
        $this->assertTrue(Schema::hasColumn('properties', 'accepts_pets'));
        $this->assertTrue(Schema::hasColumn('properties', 'sleeps'));
        $this->assertTrue(Schema::hasColumn('properties', 'beds'));
    }

    public function test_if_bookings_table_schema_and_columns_are_correct()
    {
        $this->assertTrue(Schema::hasTable('bookings'));
        $this->assertTrue(Schema::hasColumn('bookings', '__pk'));
        $this->assertTrue(Schema::hasColumn('bookings', '_fk_property'));
        $this->assertTrue(Schema::hasColumn('bookings', 'start_date'));
        $this->assertTrue(Schema::hasColumn('bookings', 'end_date'));
    }
}
