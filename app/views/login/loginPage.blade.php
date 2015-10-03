@extends('layouts.master')

@section('links_data')

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                </div> <!-- pannel-heading end -->

                <div style="padding-top:50px; padding-bottom: 50px;" class="panel-body" >

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






                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                {{ Form::submit('Login',array('class'=>'btn btn-success','id'=>'btn-login')) }}
                            </div>
                        </div>



                    {{ Form::close() }}

                    @if( Session::has('message'))
                        <div class="alert alert-info">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>
                                {{ Session::get('message') }}
                            </strong>
                        </div>
                    @endif


                </div>
            </div>
        </div>




        </div>
    </div>


@stop