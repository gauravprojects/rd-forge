@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <br><br>
                            <span>Raw material Weights available are</span>
                            <br><br>
                        </div>
                    </div>

                    <div class="row">
                        <table>
                            <tr class="heading">
                              <th>Internal No</th>
                                <th>Heat No</th>
                                <th>Material Type</th>
                                <th>Material Grade</th>
                                <th>Available Weight</th>
                            </tr>
                            @foreach($data as $data_element)
                            <tr>
                                <td>{{ $data_element->internal_no }}</td>
                                <td>{{ $data_element->heat_no }}</td>
                                <td>{{ $data_element->raw_material_type }}</td>
                                <td>{{ $data_element->material_grade }}</td>
                                <td>{{ $data_element->available_weight }}</td>
                            </tr>
                                @endforeach

                        </table>



                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop