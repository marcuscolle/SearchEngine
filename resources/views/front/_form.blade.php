<form action="{{ route('front.search') }}" method="GET">
    {{--    @csrf--}}

    <div class="row">
        <div class="form-group col-md-12">
            <x-input
                id="location"
                type="text"
                name="location"
                label="Location:"

            />
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <x-input
                type="number"
                label="Minimum Sleeps:"
                id="min_sleeps"
                name="min_sleeps"
                min="1"
                value="1"

            />
        </div>
        <div class="form-group col-md-4">
            <x-input
                type="number"
                label="Minimum Beds:"
                id="min_beds"
                name="min_beds"
                min="1"
                value="1"

            />
        </div>
        <div class="form-group col-md-4">
            <x-input
                type="date"
                label="Availability:"
                id="availability"
                name="availability"
                :min="now()->toDateString()"

            />
        </div>

    </div>

    <div class="row m-0">
        <div class="form-check col-md-2">
            <input type="checkbox" class="form-check-input" id="near_beach" name="near_beach">
            <label class="form-check-label" for="near_beach">Near the Beach</label>
        </div>
        <div class="form-check col-md-2">
            <input type="checkbox" class="form-check-input" id="accepts_pets" name="accepts_pets">
            <label class="form-check-label" for="accepts_pets">Accepts Pets</label>
        </div>
    </div>


    <button type="submit" class="btn btn-primary mt-3">Search</button>
</form>
