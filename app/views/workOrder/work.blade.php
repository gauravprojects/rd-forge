@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Work Order Entry</span>
                        </div>
                    </div>

                    <div class="row">
                        {{ Form::open(array('action'=> 'workOrderController@store')) }}
                                <!-- For recipt number of the material coming from outside -->

                        <!-- Customer Name who is placing the order -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Customer Name') }}
                            {{ Form::text('customer_name',null,array('class'=>'form-control','placeholder'=>'Customer Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Purchase order number -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Purchase Order Number') }}
                            {{ Form::text('purchase_order_no',null,array('class'=>'form-control','placeholder'=>'Purchase Order Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Puchase order date -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                            {{ Form::input('date', 'purchase_order_date') }}
                        </div>

                        <!-- Required Delivery date when the order is required -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Required Delivery Date') }}
                            {{ Form::input('date', 'required_delivery_date') }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Inspection') }}
                            {{ Form::text('inspection',null,array('class'=>'form-control','placeholder'=>'Inspection','id'=>'Justesehe')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Packing Instruction') }}
                            {{ Form::text('packing_instruction',null,array('class'=>'form-control','placeholder'=>'Packing Instruction','id'=>'Justesehe')) }}
                        </div>

                        <!-- testing Instruction -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Testing Instruction') }}
                            {{ Form::text('testing_instruction',null,array('class'=>'form-control','placeholder'=>'Testing Instruction','id'=>'Justesehe')) }}
                        </div>
                        <!-- Quotation Number -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quotation Number') }}
                            {{ Form::text('quatation_no',null,array('class'=>'form-control','placeholder'=>'Quotation Number','id'=>'Justesehe')) }}
                        </div>

                        <!-- Remarks -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',null,array('class'=>'form-control','placeholder'=>'Remarks','id'=>'Justesehe')) }}
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