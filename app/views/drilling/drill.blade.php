@extends('layouts.master')

@section('links_data')
    <script type="application/javascript">
        $(document).ready(function(){
            $('#work_order_no').click(function () {
                var work_order_no= $(this).val();
                console.log(work_order_no);
                $.ajax({
                    url:'workOrder/'+work_order_no,
                    data: work_order_no,
                    method: 'POST',
                    dataType: "json",
                }).done(function(response){
                    var i=0;
                    //console.log(response[0]['item_no']);
                    for(i=0;i<100;i++)
                    {
                        if (!(typeof response[i]['item_no']  === 'undefined' || response[i]['item_no'] === null))
                        {
                            // variable is defined
                            console.log(response[i]['item_no']);
                            $('#item_no').append("<option value="+response[i]['item_no']+">"
                                    + response[i]['item_no'] +
                                    "<option>");
                        }
                    }
                });

            });
        });
    </script>



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


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Date') }}
                            {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                        </div>


                        <!-- For WORK ORDER NUMBER -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order Number') }}

                            <select class="form-control inputfix" name="work_order_no" id="work_order_no">
                                    <option value="">----Select Work Order-----</option>
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
                            {{ Form::label('exampleInputEmail1','Item no') }}
                            <select class="form-control inputfix" name="item" id="item_no">

                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Heat Number (from forging data)') }}
                                <select class="form-control inputfix" name="heat_no" id="heat_no">
                                    <option value="">---Select Heat Number --------</option>
                                    <option value="Job Work">Job Work</option>
                                    @foreach($heat_no as $heat_no_element)
                                        <option value="{{ $heat_no_element->heat_no }}">
                                            {{ $heat_no_element->heat_no }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('size',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Machine Name') }}
                            {{ Form::text('machine_name',null,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                        </div>


                         <div class="form-group">
                            {{ Form::label('exampleInputEmail1','quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div>

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