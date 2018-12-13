@extends('layouts.app')

@section('content')
    <div class="'jumbotron">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div style="border:2px;color:red;align:right">

                                {!! $questionCharts->html()!!}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div style="border:2px;color:red;align:left;">
                                    {!! $userCharts->html()!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    {!! Charts::styles() !!}
    {!! Charts::scripts() !!}

    {!! $userCharts->script() !!}

    {!! $questionCharts->script() !!}
@endsection
