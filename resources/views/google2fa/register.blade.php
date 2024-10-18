@extends('auth.layouts.auth')

@section('body_class','register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Set up Google Authentication
                </div>

                <div class="panel-body">
                    <p>{!! $secret !!}</p>
                    <div>
                        {!! $QR_Image !!}
                    </div>
                    <p>woi</p>
                </div>

                <a href="/complete-registration"><button class="btn-primary">complete registration</button></a>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('styles')
@parent

{{ Html::style(mix('assets/auth/css/register.css')) }}
@endsection
