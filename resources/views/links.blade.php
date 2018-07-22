@extends('layouts.master')

@section('content')
    <div class="col-xs-12 col-md-8 mx-auto">
        @if (\Session::has('alert'))
            <div class="text-center">
                <div class="alert alert-danger" role="alert">
                    {!! \Session::get('alert') !!}
                </div>
            </div>
        @endif
        <div class="jumbotron">
            <h1 class="display-4">Your Links</h1>
            <p class="lead">These are your shortened links.</p>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        @if(count($links) > 0)
                        <table id="links" class="table">
                            <thead>
                            <tr class="row">
                                <th class="col-sm-2">#</th>
                                <th class="col-sm-4">full url</th>
                                <th class="col-sm-4">shortened url</th>
                                <th class="col-sm-2">delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $link)
                            <tr class="row">
                                <td class="col-sm-2">{{ $link->id }}</td>
                                <td class="col-sm-4">{{ $link->url }}</td>
                                <td class="col-sm-4"><a href="/{{ $link->hashed_url }}">{{ env('APP_URL') . '/' . $link->hashed_url }}</a></td>
                                <td class="col-sm-2">
                                    <form id="logout-form" action="{{ route('deleteLink') }}" method="POST">
                                        @csrf
                                        <input hidden name="link_id" value="{{ $link->id }}">
                                        <button type="submit" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center"><strong>No Links Found</strong></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection