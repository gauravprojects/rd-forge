@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <br><br>
                            <span>Available cutting material in inventory</span>
                            <br><br>
                        </div>
                    </div>

                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Cutting ID</th>
                                <th>Heat No</th>
                                <th>Size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Total Weight(initially)</th>
                                <th>Available Weight</th>
                            </tr>
                            @foreach($data as $data_element)
                                <tr>
                                    <td>{{ $data_element->cutting_id }}</td>
                                    <td>{{ $data_element->heat_no }}</td>
                                    <td>{{ $data_element->size }}</td>
                                    <td>{{ $data_element->pressure }}</td>
                                    <td>{{ $data_element->type }}</td>
                                    <td>{{ $data_element->schedule }}</td>
                                    <td>{{ $data_element->total_weight }}</td>
                                    <td>{{ $data_element->available_weight_cutting }}</td>
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