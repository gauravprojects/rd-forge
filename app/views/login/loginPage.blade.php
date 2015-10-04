@extends('layouts.master')

@section('links_data')
 @if( Session::has('message'))
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-info">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>
                        {{ Session::get('message') }}
                    </strong>
                </div>
                </div>
                @endif
<div class="container">

    <div id="loginbox" class="loginBox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="card" >
            <div class="loginHeading"><h5>Login</h5></div>

            <div class="panel-body panelBody" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>



                {{ Form::open(array('route'=>'login.store','id'=>'loginform','class'=>'form-horizontal','role'=>'form')) }}


                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    {{ Form::text('username',null,array('class'=>'form-control','placeholder'=>'username')) }}
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    {{ Form::text('password',null,array('class'=>'form-control','placeholder'=>'password','id'=>'login-password')) }}

                </div>

                <div style="margin-top:40px" class="form-group">
                    <!-- Button -->
                    <a class="loginButton"> 
                        {{ Form::submit('Login',array('class'=>'col-xs-12 col-sm-12 col-md-12 col-lg-12 waves-effect waves-light btn','id'=>'btn-login')) }}
                    </a>                    
                </div>



                {{ Form::close() }}
            </div>
        </div>
    </div>




</div>
</div>


@stop