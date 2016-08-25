@extends('layouts.master')

@section('links_data')

    <br><br>

    <a href="{{route('dispatch.drilling.report')}} " class="waves-effect waves-light btn link right">Dispatch Driiling reports</a>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:-80px;">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Drilling dispatch</span>
                        </div>
                    </div>


                    <div class="row">
                        {{ Form::open(array('action'=> 'dispatchController@drillingStore')) }}
                                <!-- For recipt number of the material coming from outside -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Date') }}
                            {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Forging material available in stock') }}

                            <select class="form-control search selection" id="size_select" name="drill_id" required>
                                <option value="">---Select stock which is need to dispatched --------</option>
                                @foreach($drilling_data as $drilling)

                                    <option value="{{ $drilling->drill_id }}">

                                        Work Order no- {{$drilling->work_order_no}}
                                        Item - {{ $drilling->item }}
                                        Size - {{ $drilling->size }}
                                        Pressure - {{ $drilling->pressure }}
                                        Quantity- {{ $drilling->quantity }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('exampleInputEmail','Quantity to be dispatched') }}
                            {{ Form::text('quantityDispatched',null,array('class'=>'form-control inputfix','placeholder'=>'Qunatity to be dispatched','id'=>'JustAnything')) }}
                        </div>

                        <div class="loginButton">

                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal submit" type="submit">Dispatch</button>

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
            $("#purchaseDate").datepicker();
            $("#invoiceDate").datepicker();
            $('#size_select').dropdown();
            $('#grade_select').dropdown();
            $('#manufacturer_select').dropdown();
            $('#material_type_select').dropdown();


        });

    </script>

@stop