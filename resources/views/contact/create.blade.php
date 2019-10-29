@extends('layouts.app')

@section('title','Add new recipe')

@section('content')

    <div class="container">

        @include('errors')

        <div class="card">

            <h5 class="">
                <strong>Add new contact information</strong>
            </h5>

            <form action="{{ route('contacts.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-entry">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
                    </div>

                    <div class="form-entry">
                        <label for="longitude">Longitude</label>
                        <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude" value="{{ old('longitude') }}">
                    </div>

                    <div class="form-entry">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control @error('latitude') is-invalid @enderror"  name="latitude" id="latitude" value="{{ old('latitude') }}">
                    </div>

                    <div class="form-entry">
                        <label for="manager">Manager</label>
                        <input type="text" class="form-control @error('manager') is-invalid @enderror" name="manager" id="manager" value="{{ old('manager') }}">
                    </div>

                    <div class="form-entry">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-entry">
                        <label for="phone_number">Phone number</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">
                    </div>

                    <div class="form-entry">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
