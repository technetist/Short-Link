@extends('layouts.master')

@section('content')
<div class="col-xs-12 col-md-8 mx-auto">
    @if (\Session::has('message'))
        <div class="text-center">
            <div class="alert alert-danger" role="alert">
                {!! \Session::get('message') !!}
            </div>
        </div>
    @endif
    <div class="jumbotron">
        <h1 class="display-4">Shorten Links</h1>
        <p class="lead">Enter a URL here to shorten it.</p>
        <form method="POST" action="{{ route('shorten') }}">
            @csrf
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="pre-url" name="link" placeholder="https://www.google.com" value="{{ old('link') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Submit</button>
                    </div>


                    @if ($errors->has('link'))
                        <span class="invalid-feedback" role="alert" style="display: block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </form>
        @if (\Session::has('link'))
            <div class="text-center">
                <p>Here is your shortened URL:</p>
                <a href="/{!! \Session::get('link') !!}">{!! env('APP_URL') .'/'. \Session::get('link') !!}</a>
            </div>
        @endif
    </div>
</div>
@endsection