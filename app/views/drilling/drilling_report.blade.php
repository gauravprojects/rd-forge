@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Drilling Entry report</span>
                        </div>
                    </div>



                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Drilling Id</th>
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>

                            @foreach($data as $drilling_data)

                            <tr>
                                <td>{{ $drilling_data->drilling_id }}</td>
                                <td>{{ $drilling_data->date }}</td>
                                <td>{{ $drilling_data->work_order_no }}</td>
                                <td>{{ $drilling_data->item }}</td>
                                <td>{{ $drilling_data->heat_no }}</td>
                                <td>{{ $drilling_data->quantity }}</td>
                                <td>{{ $drilling_data->machine_name }}</td>
                                <td>{{ $drilling_data->grade }}</td>


                            </tr>
                            @endforeach
                        </table>



                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="<?php echo  route('raw.excel'); ?>" class="link" >Generate Report in Excel</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop