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

        <!-- Google's jquery cdn to be placed here -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#options').change(function () {
                $options= $('#options').val();
                console.log($options);
                console.log($('#search_form'));
                $('#search_form').append('<input type="text" placeholder=" Enter '+$options+' here " name="selected" >');
               // $('#search_form').append('<input type="text" name=" '+$options+' " placeholder=" '+$options+'"' );
            });
        });
    </script>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="wrapper">
            <div class="card">
                <div class="row text-center">
                    <div class="heading">
                        <span>Raw Material Search Panel</span>
                    </div>
                </div>

                <div class="row">

                    <!-- Form open, contains three fields, category, options and particular search field -->
                    {{ Form::open(array('id'=>'search_form','action'=>'searchController@store')) }}


                            <!-- Category to be searched, category means these processes, like raw material, cutting etc -->


                    <!-- Options to be selected, to be loaded using ajax form search_selection table -->
                    {{ Form::label('exampleInputEmail1','Select from following options') }}
                    <select class="form-control ui fluid search dropdown" name="options[]" id="options" multiple="">
                        <option value="">Select form following options</option>
                        <option value="manufacturer">Manufacturer</option>
                        <option value="size">Size</option>
                        <option value="available_weight">Left Over material</option>
                    </select>

                    <br>

                     <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>

                    {{ Form::close() }}


                </div>


                @if($data)

                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Internal No</th>
                                <th>Receipt Code</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Manufacturer</th>
                                <th>Heat No</th>
                                <th>Weight</th>
                                <th>Material Type</th>
                                <th>Material Grade</th>
                                <th>Left over weight</th>
                                <th>Update/Delete</th>

                            </tr>


                            @foreach($data as $raw_data)
                                <tr>
                                    <td>{{ $raw_data->internal_no }}</td>
                                    <td>{{ $raw_data->receipt_code }}</td>
                                    <td>{{ $raw_data->date }}</td>
                                    <td>{{ $raw_data->size }}</td>
                                    <td>{{ $raw_data->manufacturer }}</td>
                                    <td>{{ $raw_data->heat_no }}</td>
                                    <td>{{ $raw_data->weight }}</td>
                                    <td>{{ $raw_data->raw_material_type }}</td>
                                    <td>{{ $raw_data->material_grade }}</td>
                                    <td>{{ $raw_data->available_weight }}</td>
                                    <td>
                                        <!-- Button for Update -->
                                        <a href="{{ action('rawMaterialController@update',array('id'=>$raw_data->internal_no))}}" class="link" >Update</a>
                                        <!-- Button for delete -->
                                        <br>
                                        <a href="{{ action('rawMaterialController@destroy',array('id'=>$raw_data->internal_no))}}" class="link" >Delete</a>
                                    </td>

                                </tr>


                            @endforeach


                        </table>
                        </div>
                </div>		<!-- row conatining form ends here -->


                    @else
                        <p class="center-align">No report currently present</p>
                    @endif

            </div>		<!-- card ends here -->
        </div>		<!-- wrapper ends here -->
    </div>		<!-- row ends here -->
</div> 		<!-- col-12 ends here -->



<script type="text/javascript">
    $(function(){
        $("#options").dropdown();
        $("#patterson").dropdown();
    });

</script>


@stop