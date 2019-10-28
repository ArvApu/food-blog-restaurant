@extends('layouts.app')

@section('content')
    <script>
        var contacts = {!! json_encode($contacts) !!};
    </script>
    <div class="content-wrapper">
        @foreach($contacts as $contact)
        <div id="contacts">

            <div id="map-{{$contact->id}}" class="map"></div>

            <div id="contacts-info">
                <p>
                    Address: <span class="contacts-meta-info">{{$contact->address}}</span>
                </p>
                <p>
                    Manager: <span class="contacts-meta-info">{{$contact->manager}}</span>
                </p>
                <p>
                    Email: <span class="contacts-meta-info"> {{$contact->email}}</span>
                </p>
                <p>
                    Phone number: <span class="contacts-meta-info">{{$contact->phone_number}}</span>
                </p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
