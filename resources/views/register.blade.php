@extends('layouts.master')

@section('content')
    <div class="col-xs-12 col-md-8 mx-auto">
        <div class="jumbotron">
            <h1 class="display-4">Register</h1>
            <p class="lead">Register to see links you created and delete them if you don't need them.</p>
            <form method="POST" action="register">
                @csrf
                <div class="form-group">
                    <label for="name">Email address</label>
                    <input type="text" class="form-control" id="name" placeholder="John Smith">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="john@gmail.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Password</label>
                    <input type="password" class="form-control" id="password-confirm">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection