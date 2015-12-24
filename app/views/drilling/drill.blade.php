@extends('layouts.master')

@section('links_data')

    <br><br>

    <a href="{{route('drilling.report')}} " class="waves-effect waves-light btn link right">Drilling reports</a>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:-80px;">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Drilling Entry</span>
                        </div>
                    </div>

                    <div class="row">
                        {{ Form::open(array('action'=> 'drillingController@store')) }}
                                <!-- For recipt number of the material coming from outside -->

                        <!-- For WORK ORDER NUMBER -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order Number') }}

                            <select class="form-control inputfix" name="work_order_no">
                                @foreach($availableWorkOrderNo as $workOrder)
                                    <option value="{{ $workOrder->work_order_no }}">
                                        {{$workOrder->work_order_no}} &nbsp;
                                        -{{$workOrder->customer_name}} &nbsp;
                                        -Ordered on:     {{ $workOrder->purchase_order_date  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- FOR ITEM TYPE -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Item') }}
                            {{ Form::text('item',null,array('class'=>'form-control inputfix','placeholder'=>'Item','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Heat Number') }}
                            {{ Form::text('heat_no',null,array('class'=>'form-control inputfix','placeholder'=>'Heat Number','id'=>'exampleInputEnail1')) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('size',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Machine Name') }}
                            {{ Form::text('machine_name',null,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                        </div>


                       {{--  <div class="form-group">
                            {{ Form::label('exampleInputEmail1','quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div> --}}

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Material Grade') }}
                            {{ Form::text('grade',null,array('class'=>'form-control inputfix','placeholder'=>'Grade','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight') }}
                            {{ Form::text('weight',null,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',null,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'anything')) }}
                        </div>

                        <div class="loginButton">

                        <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                        
                        </div>
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop