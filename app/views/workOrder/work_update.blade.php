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
                            {{ Form::text('customer_name',$record->customer_name,array('class'=>'form-control inputfix','placeholder'=>'Customer Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Purchase order number -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Purchase Order Number') }}
                            {{ Form::text('purchase_order_no',$record->purchase_order_no,array('class'=>'form-control inputfix','placeholder'=>'Purchase Order Number','id'=>'exampleInputEnail1')) }}
                        </div>

                        <!-- Puchase order date -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                            {{ Form::text('purchase_order_date',$record->purchase_order_date,array('class'=>'form-control inputfix','id'=>'purchase_order_date','name'=>'purchase_order_date','placeholder'=>'Purchase Order Date','readonly')) }}
                        </div>

                        <!-- Required Delivery date when the order is required -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Required Delivery Date') }}
                            {{ Form::text('required_delivery_date',$record->required_delivery_date,array('class'=>'form-control inputfix','id'=>'required_delivery_date','name'=>'required_delivery_date','placeholder'=>'Required Delivery Date','readonly')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Inspection') }}
                            {{ Form::text('inspection',$record->inspection,array('class'=>'form-control inputfix','placeholder'=>'Inspection','id'=>'Justesehe')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Packing Instruction') }}
                            {{ Form::text('packing_instruction',$record->packing_instruction,array('class'=>'form-control inputfix','placeholder'=>'Packing Instruction','id'=>'Justesehe')) }}
                        </div>

                        <!-- testing Instruction -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Testing Instruction') }}
                            {{ Form::text('testing_instruction',$record->testing_instruction,array('class'=>'form-control inputfix','placeholder'=>'Testing Instruction','id'=>'Justesehe')) }}
                        </div>
                        <!-- Quotation Number -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quotation Number') }}
                            {{ Form::text('quatation_no',$record->quatation_no,array('class'=>'form-control inputfix','placeholder'=>'Quotation Number','id'=>'Justesehe')) }}
                        </div>

                        <!-- Remarks -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',$record->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'Justesehe')) }}
                        </div>

                        <div class="loginButton">

                            {{-- {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }} --}}

                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>

                        </div>
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

    <script type="text/javascript">
        $(function () {
            $('#purchase_order_date').datepicker();
            $('#required_delivery_date').datepicker();
        });
    </script>


@stop