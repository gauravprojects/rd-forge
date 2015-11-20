@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Raw Material Entry report</span>
                        </div>
                    </div>


                    <div class="row">

                        <table>
                            <tr class="heading">
                                <th>Cutting Id</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Heat No</th>
                                <th>Quantity</th>
                                <th>Weight per piece</th>
                                <th>Total Weight</th>
                                <th>Size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Available Weight</th>
                            </tr>

                            @foreach($all_records as $cutting_data)
                            <tr>
                                <td>{{ $cutting_data->cutting_id }}</td>
                                <td>{{ $cutting_data->date }}</td>
                                <td>{{ $cutting_data->raw_mat_size }}</td>
                                <td>{{ $cutting_data->heat_no  }}</td>
                                <td>{{ $cutting_data->quantity }}</td>
                                <td>{{ $cutting_data->weight_per_piece }}</td>
                                <td>{{ $cutting_data->total_weight }}</td>
                                <td>{{ $cutting_data->size }}</td>
                                <td>{{ $cutting_data->pressure }}</td>
                                <td>{{ $cutting_data->type }}</td>
                                <td>{{ $cutting_data->schedule }}</td>
                                <th>{{ $cutting_data->available_weight_cutting }}</th>

                            </tr>
                            @endforeach



                        </table>

                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="<?php echo  route('cutting.excel'); ?>" class="link" >Generate Report in Excel</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop