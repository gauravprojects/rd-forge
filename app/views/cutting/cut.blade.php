    @extends('layouts.master')

    @section('links_data')

            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

            <script type="application/javascript">
                // getting the values of quantity,wpp and heat no in the js
                // function availableTotalWeight on cuttingPageController returns 0 if the data is
                // not correct and 1 if the data entered is correct


                $(document).ready(function(){

                        $('#wpp').blur(function(){ // can use form submit also
                         var wpp= $(this).val();
                         var quantity= $('#quantity').val();
                         var heat_no=$('#heat_no').val();
                            var textData= {
                                'wpp' : wpp,
                                'quantity': quantity,
                                'heat_no': heat_no
                            }
                // now sending ajax request to controlller in cutting page controller
                            $.ajax({
                                url:'cutting/availableTotalWeight',
                                method: 'POST',
                                data : textData,
                                dataType:"json",
                                success: function(response)
                                {
                                   if(response== 0)
                                   {
                                       alert("This much raw material is not avialable for selected heat no");
                                       return;
                                   }
                                }
                            });
                      });
                    });

            </script>

        <br><br>
        <a href="{{route('cutting.report')}} " class="waves-effect waves-light btn link right">Cutting reports</a>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:-80px;">
            <div class="row">
                <div class="wrapper">
                    <div class="card">
                        <div class="row text-center">
                            <div class="heading">
                                <span>Cutting Entry</span>
                            </div>
                        </div>

                        <div class="row">
                            {{ Form::open(array('action'=>'cuttingPageController@store')) }}

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                 {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Size') }}

                                <select class="form-control" name="size">
                                    @foreach($sizes as $size_element)
                                        <option value="{{ $size_element->size }}">{{$size_element->size}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- here it will show only those heat no who have available weight
                            in raw_material table -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number(available raw material)') }}

                                <select class="form-control" name="heatNo" id="heat_no">
                                    @foreach($heat_no as $heat_no_element)
                                        <option value="{{ $heat_no_element->heat_no }}">{{$heat_no_element->heat_no}}</option>
                                    @endforeach
                                </select>
                            </div>

 <br>
                           <div class="row text-center">
                                <div class="heading">
                                    <span>Cutting Description</span>
                                </div>
                            </div>

                           

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Size') }}

                                <select class="form-control" name="standard_size">
                                    @foreach($standard_size as $standard_size_element)
                                        <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- standard pressure which to be used for description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Pressure') }}

                                <select class="form-control" name="pressure">
                                    @foreach($pressure as $pressure_element)
                                        <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Type') }}

                                <select class="form-control" name="type">
                                    @foreach($type as $type_element)
                                        <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Schedule') }}

                                <select class="form-control" name="schedule">
                                    @foreach($schedule as $schedule_element)
                                        <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                    @endforeach
                                </select>
                            </div>




                            <!-- qunanity.. this is the quantity of the cutted material -->
                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Quantity') }}
                                    {{ Form::text('quantity',$dataArray['quantity'],array('class'=>'form-control inputfix','placeholder'=>'Quantity','id'=>'quantity')) }}
                                </div>

                                <!-- Wieght per piece,, weight per piece of the cutted material -->
                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail1','Weight per Piece') }}
                                    {{ Form::text('wpp',$dataArray['weight_per_piece'],array('class'=>'form-control inputfix','placeholder'=>'Weight per piece','id'=>'wpp')) }}
                                </div>

                                <!-- total weight to be calculated by itself
                                        total weight= quantity * Weight per piece -->

                                <!-- cutting item description  -->
                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Cutting Item Discription') }}
                                    {{ Form::text('cutDes',null,array('class'=>'form-control inputfix','placeholder'=>'Cutting item Discription','id'=>'JustAnything')) }}
                                </div>

                                <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->
                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail','Cutting item remarks') }}
                                    {{ Form::text('cutRem',null,array('class'=>'form-control inputfix','placeholder'=>'Cutting item remarks','id'=>'JustAnything')) }}
                                </div>


                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                               <!-- Given by pranav
                                
                            {{ Form::close() }}
                        </div>      <!- row conatining form ends here -->
                    </div>      <!-- card ends here -->
                </div>      <!-- wrapper ends here -->
            </div>      <!-- row ends here -->
        </div>      <!-- col-12 ends here -->

         <script type="text/javascript">
            $(function () {
                $('#date').datepicker("setDate",new Date());
            });
        </script>

@stop