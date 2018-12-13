@extends('layouts.app')

@section('content')
    <div class="'container">
            <div class="col-md-6">

                <div class="panel panel-primary">
                    <div class="panel-body">
                        {!! $charts->html()!!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">

                <div class="panel panel-primary">
                    <div class="panel-body">
                        {!! $charts->html()!!}
                    </div>
                </div>
            </div>
    </div>

    {!! Charts::styles() !!}
    {!! Charts::scripts() !!}
    {!! $charts->script() !!}
@endsection
