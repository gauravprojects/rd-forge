@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Machining Entry</span>
                        </div>
                    </div>

                    <div class="row">
                        {{ Form::open(array('action'=> 'machiningController@store')) }}
                                <!-- For recipt number of the material coming from outside -->

                        <!-- For WORK ORDER NUMBER -->
                        <!-- All those workorder will be shown whose status is still incomplete -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order Number') }}

                            <select class="form-control" name="work_order_no">
                                @foreach($availableWorkOrderNo as $workOrder)
                                    <option value="{{ $workOrder->work_order_no }}">{{$workOrder->work_order_no}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- FOR ITEM TYPE -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Item') }}
                            {{ Form::text('item',null,array('class'=>'form-control','placeholder'=>'Item','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Heat Number') }}
                            {{ Form::text('heat_no',null,array('class'=>'form-control','placeholder'=>'Heat Number','id'=>'exampleInputEnail1')) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('size',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Machine Name') }}
                            {{ Form::text('machine_name',null,array('class'=>'form-control','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Employee Name') }}
                            {{ Form::text('employee_name',null,array('class'=>'form-control','placeholder'=>'employee name','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Grade') }}
                            {{ Form::text('grade',null,array('class'=>'form-control','placeholder'=>'Grade','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight') }}
                            {{ Form::text('weight',null,array('class'=>'form-control','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',null,array('class'=>'form-control','placeholder'=>'weight','id'=>'anything')) }}
                        </div>

                        <div class="loginButton">

                            {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }}
                        </div>
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop