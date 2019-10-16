@extends('layouts.app')

@section('content')

    <div class="auth-container">

        <form action="{{route('login')}}" method="POST">
            @csrf
            @include('errors')
            <div class="form-group">
                <label for="email" class=""> E-Mail Address </label>

                <div class="">
                    <input id="email" type="email" name="email" class="form-input-field " value="" required autocomplete="email" autofocus>
                </div>

            </div>

            <div class="form-group">
                <label for="password" class=""> Password </label>

                <div class="">
                    <input id="password" type="password" class="form-input-field" name="password" required autocomplete="current-password">
                </div>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Sign in
                </button>
            </div>

        </form>
    </div>
@endsection
