    @extends('layouts.master')

    @section('links_data')
        <!-- Script for handling total weight checking -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#quantity').blur(function () {

                    wpp= $('#wpp').val();
                    quantity= $('#quantity').val();
                    heat_no= $('#heat_no').val();
                    textData= {
                        'wpp' : wpp,
                        'quantity' : quantity,
                        'heat_no' : heat_no
                    };
                    console.log(textData);

                    $.ajax({
                        url: 'forging/availableTotalWeight',
                        method: 'POST',
                        data: textData,
                        dataType: 'json',
                        success: function(response){
                            //alert(response);
                            if(response== 0)
                            {
                                alert("data is not valid");
                                return;
                            }
                        }
                    });
                });
                return;
            });
        </script>

        <br><br>
        <a href="{{route('forging.report')}} " class="waves-effect waves-light btn link right">Forging reports</a>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:-80px;">
            <div class="row">
                <div class="wrapper">
                    <div class="card">
                        <div class="row text-center">
                            <div class="heading">
                                <span>Forging Material Entry</span>
                            </div>
                        </div>
                        <div class="row">

                            {{ Form::open(array('action'=>'forgingController@store','id'=>'forging_form')) }}
                                    <!-- For recipt number of the material coming from outside -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                               {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <!-- Heat no for forged item -->

                            <!-- here it will show only those heat no, who have available weight corresponding
                            to cutting records table -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number(available after cutting)') }}

                                <select class="form-control search selection" name="heat_no" id="heat_no_select" required>
                                    <option value="">---Select Heat Number--------</option>
                                    @foreach($heat_no as $heat_no_element)
                                        <option value="{{ $heat_no_element->heat_no }}">{{$heat_no_element->heat_no}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Weight per peice for forged item -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight Per Piece') }}
                                {{ Form::text('weight_per_peice',$dataArray['weight_per_piece'],array('class'=>'form-control inputfix','placeholder'=>'Weight per peice','id'=>'wpp')) }}
                            </div>


                            <!-- Quantity -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Quantity') }}
                                {{ Form::text('quantity',$dataArray['quantity'],array('class'=>'form-control inputfix' ,'placeholder'=>'Quantity of material','id'=>'quantity')) }}
                            </div>


                            <!-- Forging description, it consists of four parts
                                Standard size,pressure , type and schdule -->

                             <br>

                           <div class="row text-center">
                                <div class="heading">
                                    <span>Forging Description</span>
                                </div>
                            </div>

                            <div class="form-group">
                               
                                {{ Form::label('exampleInputEmail1','Standard Size') }}

                                <select class="form-control search selection" name="standard_size" id="standardsize_select" required>
                                    <option value="">---Select Standard Size--------</option>
                                    @foreach($standard_size as $standard_size_element)
                                        <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- standard pressure which to be used for description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Pressure') }}

                                <select class="form-control search selection" name="pressure" id="pressure_select" required>
                                    <option value="">---Select Pressure--------</option>
                                    @foreach($pressure as $pressure_element)
                                        <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Standard Type') }}

                                <select class="form-control search selection" name="type" id="standardtype_select" required>
                                    <option value="">---Select Standard Type--------</option>
                                    @foreach($type as $type_element)
                                        <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Standard type for cutting, part of description -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Schedule') }}

                                <select class="form-control search selection" name="schedule" id="schedule_select" required>
                                    <option value="">---Select Schedule--------</option>
                                    @foreach($schedule as $schedule_element)
                                        <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- Forging remarks -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Forging Remarks') }}
                                {{ Form::text('remarks',$dataArray['remarks'],array('class'=>'form-control inputfix','placeholder'=>'Remarks for forging Material','id'=>'JustAnything')) }}
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
            $('#date').datepicker();
            $('#heat_no_select').dropdown();
            $('#standardsize_select').dropdown();
            $('#pressure_select').dropdown();
            $('#standardtype_select').dropdown();
            $('#schedule_select').dropdown();
        });
    </script>

    @stop