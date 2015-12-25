@extends('layouts.master')

@section('links_data')


    <script type="application/javascript">
        $(document).ready(function(){
            $('#work_order_no').click(function () {
                var work_order_no= $(this).val();
                //alert($work_order_no);
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
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Serration Entry</span>
                        </div>
                    </div>


                    @foreach($seration_array as $seration)
                        <div class="row">
                            {{ Form::open(array('action'=> 'serationController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                        <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Seration Id') }}
                                 {{ Form::text('seration_id',$seration->seration_id,array('class'=>'form-control inputfix','id'=>'seration_id','name'=>'seration_id','placeholder'=>'Date')) }}
                        </div>



                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly')) }}
                            </div>


                            <!-- For WORK ORDER NUMBER -->
                            <!-- All those workorder will be shown whose status is still incomplete -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Work Order Number') }}

                                <select class="form-control inputfix" name="work_order_no" id="work_order_no">
                                    <option value="">---Select Work Order--------</option>
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
                            <!-- These items will be of that particular work order above mentioned
                                       ------- AJAX REQUIRED HERE----------------
                                       input -> work_order_no
                                       required-> work_order_details to be autofilled on this page
                            -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Item no') }}
                                <select class="form-control inputfix" name="item" id="item_no">

                                </select>
                            </div>


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number  (from forged data)') }}
                                <select class="form-control inputfix" name="heat_no" id="heat_no">
                                    <option value="">---Select Heat Number --------</option>
                                    @foreach($heat_no as $heat_no_element)
                                        <option value="{{ $heat_no_element->heat_no }}">
                                            {{ $heat_no_element->heat_no }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('quantity',$seration->quantity,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Machine Name') }}
                            {{ Form::text('machine_name',$seration->machine_name,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                        </div>

{{--                         <div class="form-group">
                            {{ Form::label('exampleInputEmail1','quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div>
 --}}



                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Material Grade') }}
                                <select name="grade" class="form-control">
                                    @foreach($grades as $grade)
                                        @if($grade->grade_name == $seration->grade)
                                            <option value="{{ $grade->grade_name }}" selected>{{ $grade->grade_name }}</option>
                                        @else
                                            <option value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Weight') }}
                            {{ Form::text('weight',$seration->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Remarks') }}
                            {{ Form::text('remarks',$seration->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'anything')) }}
                        </div>

                        @endforeach

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