<?php

namespace App\Services\Front;

use App\Models\Property;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class SearchService
{
    private mixed $location;
    private mixed $availability;
    private mixed $minSleeps;
    private mixed $minBeds;
    private mixed $acceptsPets;
    private mixed $nearBeach;


    public function __construct($validated)
    {
        $this->location = $validated['location'];
        $this->availability = $validated['availability'];
        $this->minSleeps = $validated['min_sleeps'];
        $this->minBeds = $validated['min_beds'];
        $this->acceptsPets = $validated['accepts_pets'];
        $this->nearBeach = $validated['near_beach'];

    }

    public function propertySearch(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $location = $this->location;
        $availability = $this->availability;
        $minSleeps = $this->minSleeps;
        $minBeds = $this->minBeds;
        $acceptsPets = $this->acceptsPets;
        $nearBeach = $this->nearBeach;

        return Property::query()->where(function ($builder) use ($location, $availability, $minSleeps, $minBeds, $acceptsPets, $nearBeach) {

            $builder->whereHas('location', function ($query) use ($location) {
                $query->where('location_name', 'like', '%' . $location . '%')
                    ->orWhere('location_name', $location);
            });

            $builder->whereDoesntHave('bookings', function ($query) use ($availability) {
                $query->where('start_date', '<=', $availability)
                    ->where('end_date', '>=', $availability);
            });

            $builder->when($acceptsPets, function ($query) {
                $query->where('accepts_pets', true);
            });

            $builder->when($nearBeach, function ($query) {
                $query->where('near_beach', true);
            });

            $builder->where('sleeps', '>=', $minSleeps);

            $builder->where('beds', '>=', $minBeds);

        })->paginate(10);
    }
}
