@extends('layouts.registertemplate')

@section('title', 'Register')

@section('content')
<h4 class="mb-2">Adventure starts here 🚀</h4>
<p class="mb-4">Make your app management easy and fun!</p>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus />
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3 form-password-toggle">
        <label class="form-label" for="password">Password</label>
        <div class="input-group input-group-merge">
            <input id="password" class="form-control" type="password" name="password" required />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        </div>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
    </div>

    <button class="btn btn-primary d-grid w-100">Sign up</button>
</form>
@endsection
