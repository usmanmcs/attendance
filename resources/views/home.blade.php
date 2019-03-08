@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <form action="{{route("markin")}}" method="post">
                            {{ csrf_field() }}
                            <button id="inButton">Mark In</button>
                        </form>
                        <form action="{{route("markout")}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" id="outButton">Mark Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
