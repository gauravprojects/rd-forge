@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Drilling Report</span>
                        </div>
                    </div>

                @if($data)

                <?php $serial_number = 1; ?>
                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Work Order Number</th>
                                <th>Item</th>
                                <th>Heat no</th>
                                <th>Quantity</th>
                                <th>Machine Name</th>
                                <th>Grade</th>
                                <th>Update/Delete</th>

                            @foreach($data as $drilling_data)

                            <tr>
                                <td>{{ $serial_number++ }}</td>
                                <td>{{ date('d-m-Y',strtotime($drilling_data->date)) }}</td>
                                <td>{{ $drilling_data->work_order_no }}</td>
                                <td>{{ $drilling_data->item }}</td>
                                <td>{{ $drilling_data->heat_no }}</td>
                                <td>{{ $drilling_data->quantity }}</td>
                                <td>{{ $drilling_data->machine_name }}</td>
                                <td>{{ $drilling_data->grade }}</td>
                                <td>
                                        <a href="{{ action('drillingController@update',array('id'=>$drilling_data->drill_id))}}" class="link" >Update</a>
                                    <br>
                                    <a href="{{ action('drillingController@destroy',array('id'=>$drilling_data->drill_id))}}" class="link" >Delete</a>
                                </td>


                            </tr>
                            @endforeach
                        </table>



                        <div class="span9 btn-block excelPrint">
                            
                                <a href="<?php echo  route('drilling.excel'); ?>" class="btn btn-small btn-block" >Generate Report in Excel</a>
                           
                        </div>


              @else
                    <p class="center-align">No report currently present</p>    
              @endif
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop