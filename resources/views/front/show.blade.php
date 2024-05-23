@extends('layouts.front')

@section('content')

    @if(isset($property))
        <div class="container w-75 mt-5 border border-1 rounded shadow-sm p-5">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('storage/images/placeholder.png') }}" alt="image" class="img-fluid w-100">
                </div>
                <div class="col-md-12 mt-3">
                    <h2>{{ $property->property_name }} - {{ $property->location->location_name }}</h2>
                    <p>Sleeps: {{ $property->sleeps }}</p>
                    <p>Beds: {{ $property->beds }}</p>
                    <p>Near Beach: {{ $property->near_beach ? 'Yes' : 'No' }}</p>
                    <p>Accepts Pets: {{ $property->accepts_pets ? 'Yes' : 'No' }}</p>
                    <p>Location: {{ $property->location->location_name }}</p>

                </div>

                <div class="col-md-6">
                    <a href="#" class="btn btn-outline-success mt-1 w-100">Book now</a>
                </div>

                <div class="col-md-6">
                    <a href="#" class="btn btn-outline-warning mt-1 w-100">Enquire</a>
                </div>

            </div>
        </div>
    @endif

    <div class="container mt-3 p-0 w-75">
        <a href="{{ route('front.index') }}" class="btn btn-primary">Search Again</a>
    </div>

@endsection
