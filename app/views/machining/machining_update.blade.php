@extends('layouts.master')

@section('links_data')

    <script type="application/javascript">
    function change_parameters()
    {
        $work_order_no = '<div class="form-group">'+
                        '<select class="form-control search selection" id="work_order_no_select" required>'+
                                '<option value="">---Select Work Order--------</option>'+
                                '@foreach($availableWorkOrderNo as $workOrder)'+
                                    '<option value="{{ $workOrder->work_order_no }}">'+
                                        '{{$workOrder->work_order_no}} &nbsp;'+
                                        '-{{$workOrder->customer_name}} &nbsp;'+
                                        '-Ordered on:     {{ date("d-m-Y",strtotime($workOrder->purchase_order_date))  }}'+
                                    '</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</div>';
        $item =  '<div class="form-group">'+
                                '<select class="form-control search selection" id="item_no_select" required>'+
                                    '<option value="">---Select Item Number --------</option>'+
                                '</select>'+
                            '</div>';
                            
        $("#avinash").html($work_order_no+$item);

        $(".parameter_button").attr("onclick","revert_parameters()");
        $('#work_order_no_select').attr("name","work_order_no");
        $('#item_no_select').attr("name","item");

         $('#work_order_no_select').dropdown({
                    onChange : function(){ 

                        var work_order_no = $(this)[0].value;

                        $.ajax({

                            'type' : 'GET',
                            'url' : 'http://localhost/rd-forge/public/workOrderMaterial',
                            'data' : {work_order_no : work_order_no}

                        })
                        .done(function(data)
                        {                            
                            $.each(JSON.parse(data),function(key,value)
                            {
                            $("#item_no_select").append(
                            '<option value="'+value['work_order_no']+'-'+value['item_no']+'-'+value['size']+'-'+value['pressure']+'-'+value['type']+'-'+value['schedule']+'">'+value['work_order_no']+"/"+value['item_no']+' - '+value['size']+'" - '+value['pressure']+'# - '+value['type']+' x '+value['schedule']+'</option>');
                            });
                            
                        });

                     }
                });
                $('#item_no_select').dropdown();
                $('#heat_no_select').dropdown();
                $('#grade_select').dropdown();
    }

    function revert_parameters()
    {
         $("#avinash").html("");
         $(".parameter_button").attr("onclick","change_parameters()");
    }
        // $(document).ready(function(){
        //     $('#work_order_no').click(function () {
        //         var work_order_no= $(this).val();
        //         //alert($work_order_no);
        //         console.log(work_order_no);
        //         $.ajax({
        //             url:'workOrder/'+work_order_no,
        //             data: work_order_no,
        //             method: 'POST',
        //             dataType: "json",
        //         }).done(function(response){
        //             var i=0;
        //             //console.log(response[0]['item_no']);
        //             for(i=0;i<100;i++)
        //             {
        //                 if (!(typeof response[i]['item_no']  === 'undefined' || response[i]['item_no'] === null))
        //                 {
        //                     // variable is defined
        //                     console.log(response[i]['item_no']);
        //                     $('#item_no').append("<option value="+response[i]['item_no']+">"
        //                             + response[i]['item_no'] +
        //                             "<option>");
        //                 }
        //             }
        //         });

        //     });
        // });
    </script>


    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Machining Entry</span>
                        </div>
                    </div>


                    @foreach($machining_array as $machining)
                        <div class="row">
                            {{ Form::open(array('action'=> 'machiningController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                {{ Form::text('date',date('d-m-Y',strtotime($machining->date)),array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>


                        {{ Form::hidden('machining_id',$machining->mach_id,array('class'=>'form-control inputfix','id'=>'machining_id','name'=>'machining_id','placeholder'=>'Date')) }}

                            <!-- For WORK ORDER NUMBER -->
                            <!-- All those workorder will be shown whose status is still incomplete -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Work Order Number') }}
                                <select class="form-control search selection" name="work_order_no" readonly>
                                    @foreach($availableWorkOrderNo as $workOrder)
                                        @if($machining->work_order_no == $workOrder->work_order_no)
                                        
                                        <option value="{{ $workOrder->work_order_no }}" selected>
                                            {{$workOrder->work_order_no}} &nbsp;
                                            -{{$workOrder->customer_name}} &nbsp;
                                            -Ordered on:     {{ date('d-m-Y',strtotime($workOrder->purchase_order_date))  }}
                                        </option>
                                        
                                        @endif
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Work Order Item') }}
                                <select class="form-control search selection" name="item" readonly>

                                    @foreach($availableWorkOrderItemNo as $workOrder)
                                        @if($machining->work_order_no == $workOrder->work_order_no && $machining->item == $workOrder->item_no)
                                            
                                        <option value="{{$workOrder->work_order_no}}-{{ $workOrder->item_no }}-{{ $workOrder->size }}-{{ $workOrder->pressure }}-{{ $workOrder->type }}-{{$workOrder->schedule}}" selected>{{ $workOrder->work_order_no }}/{{ $workOrder->item_no }} - {{ $workOrder->size }}" - {{ $workOrder->pressure }}# - {{ $workOrder->type }} x {{$workOrder->schedule}}
                                                </option>

                                                <?php $old_machining_work_order_proper = $workOrder->work_order_no."-".$workOrder->item_no; ?>

                                        @endif
                                    @endforeach
                                </select>

                            </div>


                    <a href="#" class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button parameter_button" onclick="change_parameters()">Change parameters</a>
                        

                    <div id="avinash">


                    </div>

                        <?php $old_machining_work_order = $machining->work_order_no."-".$machining->item; ?>
                                <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number(available forging)') }}

                                <select class="form-control search selection" name="heat_no" id="heat_no_select" required>
                                    <option value="">------Select Heat Number----------</option>

                                    @foreach($heat_no as $heat_no_element)
                                        <option value="{{ $heat_no_element->heat_no }}-{{ $heat_no_element->size }}-{{ $heat_no_element->pressure }}-{{ $heat_no_element->type }}-{{ $heat_no_element->schedule }}" selected>{{$heat_no_element->heat_no}} - {{ $heat_no_element->size }}" - {{ $heat_no_element->pressure }}# - {{ $heat_no_element->type }} x {{ $heat_no_element->schedule }}</option>
                                        <?php $old_machining_data = $heat_no_element->heat_no."-".$heat_no_element->size."-".$heat_no_element->pressure."-".$heat_no_element->type."-".$heat_no_element->schedule; ?>
                                        {{--This was not Working So changed it to WORK for testing ^--}}
                                    {{--  @if($machining->heat_no == $heat_no_element->heat_no && $machining->forging_size == $heat_no_element->size && $machining->forging_pressure == $heat_no_element->pressure && $machining->forging_type == $heat_no_element->type && $machining->forging_pressure == $heat_no_element->pressure)--}}

                                            {{--<option value="{{ $heat_no_element->heat_no }}-{{ $heat_no_element->size }}-{{ $heat_no_element->pressure }}-{{ $heat_no_element->type }}-{{ $heat_no_element->schedule }}" selected>{{$heat_no_element->heat_no}} - {{ $heat_no_element->size }}" - {{ $heat_no_element->pressure }}# - {{ $heat_no_element->type }} x {{ $heat_no_element->schedule }}</option>--}}

                                            {{--<?php $old_machining_data = $heat_no_element->heat_no."-".$heat_no_element->size."-".$heat_no_element->pressure."-".$heat_no_element->type."-".$heat_no_element->schedule; ?>--}}
                                        {{--@else--}}
                                             {{--<option value="{{ $heat_no_element->heat_no }}-{{ $heat_no_element->size }}-{{ $heat_no_element->pressure }}-{{ $heat_no_element->type }}-{{ $heat_no_element->schedule }}">{{$heat_no_element->heat_no}} - {{ $heat_no_element->size }}" - {{ $heat_no_element->pressure }}# - {{ $heat_no_element->type }} x {{ $heat_no_element->schedule }}</option>--}}
                                        {{--@endif--}}
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Quantity') }}
                                {{ Form::text('quantity',$machining->quantity,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'justAnything')) }}

                                <?php $old_machining_quantity = $machining->quantity; ?>

                            </div>


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Machine Name') }}
                                {{ Form::text('machine_name',$machining->machine_name,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                            </div>

                            <!-- to be fetched from master grades -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Material Grade') }}
                                <select name="grade" class="form-control search selection" id="grade_select" required>
                                    <option value="">---Select Grade --------</option>
                                    @foreach($grades as $grade)
                                        @if($grade->grade_name == $machining->grade)
                                            <option value="{{ $grade->grade_name }}" selected>{{ $grade->grade_name }}</option>
                                        @else
                                            <option value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <!-- DOUBT HERE, which weight is this, refer doubts -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',$machining->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                            </div>

                            
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Remarks') }}
                                {{ Form::text('remarks',$machining->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'anything')) }}
                            </div>

                        {{ Form::hidden('old_machining_work_order',$old_machining_work_order,array('class'=>'form-control inputfix'))}}
                        {{ Form::hidden('old_machining_work_order_proper',$old_machining_work_order_proper,array('class'=>'form-control inputfix'))}}
                        {{ Form::hidden('old_machining_data',$old_machining_data,array('class'=>'form-control inputfix'))}}
                        {{ Form::hidden('old_machining_quantity',$old_machining_quantity,array('class'=>'form-control inputfix'))}}

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
        <script type="text/javascript">
            $(function () {
                $('#date').datepicker();
            });
        </script>


@stop