@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <br><br>
                            <span>Available Raw material in inventory </span>
                            <br><br>
                        </div>
                    </div>
                    <?php $serial_number = 1; ?>
                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Serial No</th>
                                <th>Heat No</th>
                                <th>Material Type</th>
                                <th>Material Grade</th>
                                <th>Size</th>
                                <th>Available Weight</th>
                            </tr>
                            @foreach($data as $data_element)
                            <tr>
                                <td>{{ $serial_number++ }}</td>
                                <td>{{ $data_element->heat_no }}</td>
                                <td>{{ $data_element->raw_material_type }}</td>
                                <td>{{ $data_element->material_grade }}</td>
                                <td>{{ $data_element->size }}</td>
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