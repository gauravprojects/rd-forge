    @extends('layouts.master')

    @section('links_data')

<style type="text/css">

.ui.label {
    color:black;
    display: inline-block;
    line-height: 1;
    vertical-align: baseline;
    margin: 0em 0.14285714em;
    background-color: #e8e8e8;
    background-image: none;
    padding: 0.5833em 0.833em;
    /* color: rgba(0, 0, 0, 0.6); */
    text-transform: none;
    font-weight: bold;
    border: 0px solid transparent;
    border-radius: 0.28571429rem;
    -webkit-transition: background 0.1s ease;
    transition: background 0.1s ease;
}

.ui.label > .delete.icon {
    cursor: pointer;
    margin-right: 0em;
    margin-left: 0.5em;
    font-size: 0.92857143em;
    opacity: 0.5;
    -webkit-transition: background 0.1s ease;
    transition: background 0.1s ease;
}

i.icon.delete:before {
    content: "\f00d";
}

        </style>
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

        <script type="application/javascript">

            var $item_no_count=1;
           $(document).ready(function(){
              $('#add_record').click(function(){
                    //alert("function being called");

                  <!-- Size -->
                  $size= '<td><select class="form-control ui fluid search dropdown standardsize_select" name="standard_size[]" required> @foreach($standard_size as $standard_size_element)
                              <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option> @endforeach
                                </select></td>';

                  <!-- pressure -->
                  $pressure= '<td><select class="form-control ui fluid search dropdown pressure_select" name="pressure[]" required>@foreach($pressure as $pressure_element)
                              <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>@endforeach
                      </select></td>';

                  <!-- Type -->
                  $type= '<td><select class="form-control ui fluid search dropdown standardtype_select" name="type[]" required>@foreach($type as $type_element)
                              <option value="{{ $type_element->type }}">{{$type_element->type}}</option>@endforeach
                      </select></td>';


                  <!-- Schedule -->
                  $schedule= '<td><select class="form-control ui fluid search dropdown schedule_select" name="schedule[]" required> @foreach($schedule as $schedule_element)
                              <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option> @endforeach
                      </select></td>';


             <!-- Jquery append function to append everything to the table -->
              $("table").append("<tr>"+$size+$pressure+$type+$schedule+"</tr>");

              //Re initializing the dropdowns so that there is no problem
                    $('.standardsize_select').dropdown();
                    $('.pressure_select').dropdown();
                    $('.standardtype_select').dropdown();
                    $('.schedule_select').dropdown();

              });

             $('#delete_record').click(function(){

              $("table tr:last-child").remove();
              --$item_no_count;

             });

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
                                        <option value="{{ $heat_no_element->heat_no }}-{{ $heat_no_element->standard_size }}-{{ $heat_no_element->pressure }}-{{ $heat_no_element->type }}-{{ $heat_no_element->schedule }}">{{$heat_no_element->heat_no}}-{{ $heat_no_element->standard_size }}-{{ $heat_no_element->pressure }}-{{ $heat_no_element->type }}-{{ $heat_no_element->schedule }}</option>
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

                        <a id="delete_record" class="waves-effect waves-light btn right">Delete Field</a>

                        <a id="add_record" class="waves-effect waves-light btn right">Add Field</a>

                        <div class="row">

                            <?php $count=0; ?>
                            <br/>
                            <table class="table table-bordered table-condensed">
                                <tbody>
                                    <tr>
                                        <th class="heading" style="text-align:center; width: 12%">Size</th>
                                        <th class="heading" style="text-align:center; width:12%">Pressure</th>
                                        <th class="heading" style="text-align:center; width: 12%">Type</th>
                                        <th class="heading" style="text-align:center; width: 12%">Schedule</th>
                                    </tr>


                                    <td>
                                        <!-- Size -->
                                <select class="form-control ui fluid search dropdown standardsize_select" name="standard_size[]" required>
                                    <option value="">---Select Standard Size--------</option>
                                    @foreach($standard_size as $standard_size_element)
                                        <option value="{{ $standard_size_element->std_size }}">{{$standard_size_element->std_size}}</option>
                                    @endforeach
                                </select>
                                    </td>

                                    <td>
                                        <!-- Pressure -->
                                <select class="form-control ui fluid search dropdown pressure_select" name="pressure[]" required>
                                    <option value="">---Select Pressure--------</option>
                                    @foreach($pressure as $pressure_element)
                                        <option value="{{ $pressure_element->pressure }}">{{$pressure_element->pressure}}</option>
                                    @endforeach
                                </select>
                                    </td>

                                    <td>
                                        <!-- Type -->
                                <select class="form-control ui fluid search dropdown standardtype_select" name="type[]" required>
                                    <option value="">---Select Type--------</option>
                                    @foreach($type as $type_element)
                                        <option value="{{ $type_element->type }}">{{$type_element->type}}</option>
                                    @endforeach
                                </select>
                                    </td>

                                    <td>
                                        <!-- Schedule -->
                                <select class="form-control ui fluid search dropdown schedule_select" name="schedule[]" required>
                                    <option value="">---Select Schedule--------</option>
                                    @foreach($schedule as $schedule_element)
                                        <option value="{{ $schedule_element->schedule }}">{{$schedule_element->schedule}}</option>
                                    @endforeach
                                </select>
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                           
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
            $('.standardsize_select').dropdown();
            $('.pressure_select').dropdown();
            $('.standardtype_select').dropdown();
            $('.schedule_select').dropdown();
        });
    </script>

    @stop