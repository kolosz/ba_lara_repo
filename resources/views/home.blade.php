@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="top-right links">
                        @auth

                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- here my work starts -->
                    <p>Welcome {{ auth()->user()->name }}</p>
                    <p>You are logged in!</p>
                    <!-- only viewable for admins -->
                    <div class="links">
                        @if(Auth::user()->hasRole('admin'))
                            <a class="btn btn-primary btn-lg" href="/admin_base">Admin Page</a>
                        @endif
                    </div>
                    <br>
                    <br>
                    <!-- IMPLEMENT TIME RECORDING -->
                    <div class="time-recording">
                        <!-- START -->
                        <div id="start">
                            @csrf
                            <button
                                class="btn btn-primary btn-lg"
                                type="button"
                                id="start-btn"
                                name="start-btn"
                                value="start"
                            >start</button>
                            <p id="start-lbl">You did not started working yet.</p>
                        </div>
                        <!-- PAUSE -->
                        <div id="start-pause">
                            @csrf
                            <button
                                class="btn btn-primary btn-lg"
                                type="button"
                                id="start-pause-btn"
                                name="start-pause-btn"
                                value="start pause"
                                disabled
                            >start pause</button>
                            <p id="start-pause-lbl">You did not take a break yet.</p>
                        </div>
                        <div id="end-pause">
                            @csrf
                            <button
                                class="btn btn-primary btn-lg"
                                type="button"
                                id="end-pause-btn"
                                name="end-pause-btn"
                                value="end pause"
                                disabled
                            >end pause</button>
                            <p id="end-pause-lbl">You did not take a break yet.</p>
                        </div>
                        <!-- STOP -->
                        <div id="stop">
                            @csrf
                            <button
                                class="btn btn-primary btn-lg"
                                type="button"
                                id="stop-btn"
                                name="stop-btn"
                                value="stop"
                                disabled
                            >stop</button>
                            <p id="stop-lbl">To end your workday, click here!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Vacation Planning</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- here the work starts -->
                    <div class="vacation">
                        <p>Remaining unplanned vacation in days:</p><br>
                        <!-- get from table and print here -->
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Feeling dizzy?</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- here the work starts -->
                    <div class="sick">
                        <form>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
