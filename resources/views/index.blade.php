@extends('layouts.master')

@section('content')
<div class="col-xs-12 col-md-8 mx-auto">
    <div class="jumbotron">
        <h1 class="display-4">Shorten Links</h1>
        <p class="lead">Enter a URL here to shorten it.</p>
        <form>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="pre-url">https://</span>
                    </div>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="pre-url">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection