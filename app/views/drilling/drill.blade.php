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


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Date') }}
                            {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                        </div>


                        <!-- For WORK ORDER NUMBER -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Work Order Number (from machined data)') }}

                            <select class="form-control search selection" name="work_order_no" id="work_order_no_select" required>
                                <option value="">----Select Work Order-----</option>
                                @foreach($availableWorkOrderNo as $workOrder)
                                    <option value="{{ $workOrder->work_order_no }}">
                                        {{$workOrder->work_order_no}} &nbsp;
                                        -{{$workOrder->customer_name}} &nbsp;
                                        -Ordered on:     {{ date('d-m-Y',strtotime($workOrder->purchase_order_date))}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- FOR ITEM TYPE -->
                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Item no') }}
                            <select class="form-control search selection" name="item" id="item_no_select">
                                <option value="">---Select Item Number --------</option>
                            </select>
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Size') }}
                            {{ Form::text('size',null,array('class'=>'form-control inputfix','placeholder'=>'Size','id'=>'justAnything')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Machine Name') }}
                            {{ Form::text('machine_name',null,array('class'=>'form-control inputfix','placeholder'=>'Machine Name','id'=>'exampleInputEnail1')) }}
                        </div>


                         <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Quantity') }}
                            {{ Form::text('quantity',null,array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'exampleInputEnail1')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Material Grade') }}
                            <select class="form-control search selection" name="grade" id="grade_select" required>
                                <option value="">---Select Grade--------</option>
                                @foreach($grades as $grade_element)
                                    <option value="{{ $grade_element->grade_name }}">{{$grade_element->grade_name}}</option>
                                @endforeach
                            </select>
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

    <script type="text/javascript">
    $(function () {
        $('#date').datepicker();      
        $('#work_order_no_select').dropdown({
                    onChange : function(){ 

                        var work_order_no = $(this)[0].value;

                        $.ajax({

                            'type' : 'GET',
                            'url' : 'workOrderMaterial',
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
    });
</script>

@stop