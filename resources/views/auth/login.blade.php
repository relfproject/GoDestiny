@extends('layouts.auth')

@section('content')
    <div class="auth-left">
        <h2>Welcome Back 👋</h2>
        <p>Login to continue your journey</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email Address" required autofocus>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p style="margin-top: 1rem;">
            Don’t have an account? <a href="{{ route('register') }}" data-animate>Sign up</a>
        </p>
    </div>
@endsection