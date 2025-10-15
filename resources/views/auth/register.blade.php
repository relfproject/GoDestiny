@extends('layouts.auth')

@section('content')
    <div class="auth-left">
        <h2>Create Account ✨</h2>
        <p>Join and start exploring destinations</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>

        <p style="margin-top: 1rem;">
            Already have an account? <a href="{{ route('login') }}" data-animate>Login</a>
        </p>
    </div>
@endsection