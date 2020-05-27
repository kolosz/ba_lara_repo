@extends('layouts/layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <!-- create a logout btn -->
                <a href="{{ url('/logout') }}">Logout</a>
                <!-- ---   ---   ---   --- -->
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            schenker time recording development
        </div>

        <div class="links">
            <a href="https://www.schenker-tech.de/">Schenker Technologies</a>
            <a href="https://www.xmg.gg/">XMG</a>
            <a href="https://bestware.com/de/">Bestware</a>
            <a href="https://laravel.com/docs">Laravel Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
        </div>
    </div>
</div>

@endsection
