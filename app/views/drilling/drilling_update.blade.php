@extends('layouts.master')

@section('links_data')
    <script type="application/javascript">
        // $(document).ready(function(){
        //     $('#work_order_no').click(function () {
        //         var work_order_no= $(this).val();
        //         console.log(work_order_no);
        //         $.ajax({
        //             url:'workOrder/'+work_order_no,
        //             data: work_order_no,
        //             method: 'POST',
        //             dataType: "json",
        //         }).done(function(response){
        //             var i=0;
        //             console.log(response[0]['item_no']);
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
                            <span>Drilling Entry</span>
                        </div>
                    </div>


                    @foreach($drilling_array as $drilling)
                        <div class="row">
                            {{ Form::open(array('action'=> 'drillingController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                {{ Form::text('date',date('d-m-Y',strtotime($drilling->date)),array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>


                            {{ Form::hidden('drilling_id',$drilling->drill_id,array('class'=>'form-control inputfix','id'=>'drilling_id','name'=>'drilling_id','placeholder'=>'Date')) }}

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Work Order Number') }}

                                    @foreach($availableWorkOrderNo as $workOrder)
                                        @if($drilling->work_order_no == $workOrder->work_order_no)
                                            
                                                {{$workOrder->work_order_no}} &nbsp;
                                                -{{$workOrder->customer_name}} &nbsp;
                                                -Ordered on:    {{ date('d-m-Y',strtotime($workOrder->purchase_order_date))  }}
                                        
                                        @endif
                                    @endforeach

                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Work Order Item') }}

                                    @foreach($availableWorkOrderItemNo as $workOrder)
                                        @if($drilling->work_order_no == $workOrder->work_order_no && $drilling->item == $workOrder->item_no)
                                            
                                         {{ $workOrder->work_order_no }}/{{ $workOrder->item_no }} - {{ $workOrder->size }}" - {{ $workOrder->pressure }}# - {{ $workOrder->type }} x {{$workOrder->schedule}}

                                        @endif
                                    @endforeach

                            </div>

                             <a href="#" class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" onclick="change_parameters()">Change parameters</a>

                        <div class="form-group">
                        {{ Form::label('exampleInputEmail1','Work Order Number') }}

                           <select class="form-control search selection" name="work_order_no" id="work_order_no_select" required disabled>
                                <option value="">---Select Work Order--------</option>
                                @foreach($availableWorkOrderNo as $workOrder)
                                    <option value="{{ $workOrder->work_order_no }}">
                                        {{$workOrder->work_order_no}} &nbsp;
                                        -{{$workOrder->customer_name}} &nbsp;
                                        -Ordered on:     {{ date('d-m-Y',strtotime($workOrder->purchase_order_date))  }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Item no') }}
                            <select class="form-control search selection" name="item" id="item_no_select" required disabled>
                                <option value="">---Select Item Number --------</option>
                            </select>
                        </div>

                        <?php $old_drilling_work_order = $drilling->work_order_no."-".$drilling->item; ?>


                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Machine Name') }}
                                {{ Form::text('machine_name',$drilling->machine_name,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                            </div>

                            <!-- Employee name removed after new review from the client  -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','quantity') }}
                                {{ Form::text('quantity',$drilling->quantity,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                            </div>

                            <?php $old_drilling_quantity = $drilling->quantity; ?>


                            <!-- to be fetched from master grades -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Material Grade') }}
                                <select name="grade" class="form-control search selection" id="grade_select" required>
                                    <option value="">---Select Grade--------</option>
                                    @foreach($grades as $grade)
                                        @if($grade->grade_name == $drilling->grade)
                                            <option value="{{ $grade->grade_name }}" selected>{{ $grade->grade_name }}</option>
                                        @else
                                            <option value="{{ $grade->grade_name }}">{{ $grade->grade_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            {{--<!-- DOUBT HERE, which weight is this, refer doubts -->--}}
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',$drilling->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'exampleInputEnail1')) }}
                            </div>

                            
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Remarks') }}
                                {{ Form::text('remarks',$drilling->remarks,array('class'=>'form-control inputfix','placeholder'=>'Remarks','id'=>'anything')) }}
                            </div>

                        {{ Form::hidden('old_drilling_work_order',$old_drilling_work_order,array('class'=>'form-control inputfix'))}}
                       
                        {{ Form::hidden('old_drilling_quantity',$old_drilling_quantity,array('class'=>'form-control inputfix'))}}

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
        $('#work_order_no_select').dropdown({
                    onChange : function(){ 

                        var work_order_no = $(this)[0].value;

                        $.ajax({

                            'type' : 'GET',
                            'url' : 'http://localhost/rd-forge/public/machinedWorkOrderMaterial',
                            'data' : {work_order_no : work_order_no}

                        })
                        .done(function(data)
                        {                            
                            $.each(JSON.parse(data),function(key,value)
                            {
                            $("#item_no_select").append(
                            '<option value="'+value['work_order_no']+'-'+value['item']+'-'+value['size']+'-'+value['pressure']+'-'+value['type']+'-'+value['schedule']+'">'+value['work_order_no']+"/"+value['item']+' - '+value['size']+'" - '+value['pressure']+'# - '+value['type']+' x '+value['schedule']+'</option>');
                            });
                            
                        });

                     }
                });
        $('#item_no_select').dropdown();
        $('#heat_no_select').dropdown();
        $('#grade_select').dropdown();
    });

function change_parameters()
{
    $('#work_order_no_select').removeAttr('disabled');
    $('#work_order_no_select').parent().removeClass('disabled');
    $('#item_no_select').removeAttr('disabled');
    $('#item_no_select').parent().removeClass('disabled');
}
    </script>

@stop