@extends('layouts.front')

@section('content')


    <div class="container p-0 w-75">
        <a href="{{ route('front.index') }}" class="btn btn-primary">Search Again</a>
    </div>

    @forelse($properties as $property)
        <div class="container mt-3 w-75 border border-1 rounded shadow-sm p-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('storage/images/placeholder.png') }}" alt="image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2>{{ $property->property_name }} - {{ $property->location->location_name }}</h2>
                    <p>Sleeps: {{ $property->sleeps }}</p>
                    <p>Beds: {{ $property->beds }}</p>
                    <p>Near Beach: {{ $property->near_beach ? 'Yes' : 'No' }}</p>
                    <p>Accepts Pets: {{ $property->accepts_pets ? 'Yes' : 'No' }}</p>
                    <p>Location: {{ $property->location->location_name }}</p>

                    <a href="#" class="btn btn-outline-success mt-1 w-100">Book now</a>
                    <a href="{{ route('front.show', ['property' => $property]) }}" class="btn btn-outline-primary mt-1 w-100">View Property</a>
                    <a href="#" class="btn btn-outline-warning mt-1 w-100">Enquire</a>
                </div>

            </div>
        </div>
    @empty
        <div class="container mt-5 border border-1 rounded shadow-sm p-5">
            <h1>No properties found</h1>
        </div>
    @endforelse

    <div class="d-flex justify-content-center mt-5">
        {{ $properties->appends(request()->query())->links() }}
    </div>


@endsection
