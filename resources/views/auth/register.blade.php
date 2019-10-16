@extends('layouts.app')

@section('content')


    <div class="auth-container">

        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username" class=""> Username </label>

                <div class="">
                    <input id="username" type="text" class="form-input-field" name="username" value="{{old('username')}}" required autofocus >
                </div>

                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="first_name" class=""> First name </label>

                <div class="">
                    <input id="first_name" type="text" class="form-input-field" name="first_name" value="{{old('first_name')}}" required>
                </div>

                @error('first_name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="last_name" class=""> Last name </label>

                <div class="">
                    <input id="last_name" type="text" class="form-input-field" name="last_name" value="{{old('last_name')}}" required>
                </div>

                @error('last_name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class=""> E-Mail Address </label>

                <div class="">
                    <input id="email" type="email" name="email" class="form-input-field " value="{{old('email')}}" required autocomplete="email">
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class=""> Password </label>

                <div class="">
                    <input id="password" type="password" class="form-input-field" name="password" required>
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class=""> Confirm Password </label>

                <div class="">
                    <input id="password" type="password" class="form-input-field" name="password_confirmation" required>
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
