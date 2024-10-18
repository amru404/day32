@extends('auth.layouts.auth')

@section('body_class','login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Set up Google Authentication
                    <hr>
                    @if ($errors->any())
                     <div class="col-md-12">
                        <div class="alert alert-danger">
                            <strong>{{$errors->first()}}</strong>
                        </div>
                     </div>
                 @endif

                </div>

                <div class="panel-body">
                    <form action="{{route('2fa')}}" class="form-horizontal" method="post" >
                        {{csrf_field()}}

                        <div class="form-group">
                            <p>label</p>
                            <input type="number" name="one_time_password" id="one_time_password" required>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn-primary">login</button>
                            </div>
                        </div>
                    </form>           

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
