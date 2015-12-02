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

                            <select class="form-contro inputfixl" name="work_order_no">
                                @foreach($availableWorkOrderNo as $workOrder)
                                    <option value="{{ $workOrder->work_order_no }}">{{$workOrder->work_order_no}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- FOR ITEM TYPE -->
                        <!-- These items will be of that particular work order above mentioned
                                   ------- AJAX REQUIRED HERE----------------
                                   input -> work_order_no
                                   required-> work_order_details to be autofilled on this page
                        -->
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

                        <!-- Employee name removed after new review from the client  -->

                       {{--  <div class="form-group">
                            {{ Form::label('exampleInputEmail1','quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div> --}}


                        <!-- to be fetched from master grades -->

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Material Grade') }}
                            <select name="grade" class="form-control">
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <!-- DOUBT HERE, which weight is this, refer doubts -->
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