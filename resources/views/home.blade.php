@extends('layouts/layout')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- here my work starts -->
                    <p>Welcome {{ auth()->user()->name }}</p>
                    <p>You are logged in!</p>
                    <br>
                    <!-- try to implement basic functions -->
                    <div class="time-recording">
                        <div id="start">
                            <form action="app/Http/Controllers/HomeController.php">
                                <input
                                    type="submit"
                                    id="start-btn"
                                    name="start-btn"
                                    value="start"
                                >
                                <p id="start-lbl">you did not started working yet.</p>
                            </form>
                        </div>
                        <div id="pause">
                            <form action="" method="post">
                                <input
                                    type="submit"
                                    id="pause-btn"
                                    name="pause-btn"
                                    value="pause"
                                >
                                <p id="pause-lbl">you did not took a break yet.</p>
                            </form>
                        </div>
                        <div id="stop">
                            <form action="" method="post">
                                <input
                                    type="submit"
                                    id="stop-btn"
                                    name="stop-btn"
                                    value="stop"
                                >
                                <p id="stop-lbl">... test ... </p>
                            </form>
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
