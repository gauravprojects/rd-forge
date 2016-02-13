@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper wrapperRawReport">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Cutting Report</span>
                        </div>
                    </div>

                @if($all_records)
                
                    <?php $serial_number = 1; ?>
                    <div class="row">

                        <table> 
                            <tr class="heading">
                                <th>S.No</th>
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
                                <th>Update/Delete</th>
                            </tr>

                            @foreach($all_records as $cutting_data)
                            <tr>
                                <td>{{ $serial_number++ }}</td>
                                <td>{{ date('d-m-Y',strtotime($cutting_data->date)) }}</td>
                                <td>{{ $cutting_data->raw_mat_size }}</td>
                                <td>{{ $cutting_data->heat_no  }}</td>
                                <td>{{ $cutting_data->quantity }}</td>
                                <td>{{ $cutting_data->weight_per_piece }}</td>
                                <td>{{ $cutting_data->total_weight }}</td>
                                <td>{{ $cutting_data->size }}</td>
                                <td>{{ $cutting_data->pressure }}</td>
                                <td>{{ $cutting_data->type }}</td>
                                <td>{{ $cutting_data->schedule }}</td>
                                <td>{{ $cutting_data->available_weight_cutting }}</td>
                            
                                    <td><a href="{{ action('cuttingPageController@update',array('id'=>$cutting_data->cutting_id))}}" class="link" >Update</a>
                                 <a href="{{ action('cuttingPageController@destroy',array('id'=>$cutting_data  ->cutting_id))}}" class="link" >Delete</a>
                                </td>



                                

                            </tr>
                            @endforeach



                        </table>

                        <div class="span9 btn-block excelPrint">
                            
                                <a href="<?php echo  route('cutting.excel'); ?>" class="btn btn-small btn-block" >Generate Report in Excel</a>
                        
                        </div>


              @else
                    <p class="center-align">No report currently present</p>    
              @endif
                    </div>      <!-- row conatining form ends here -->
                </div>      <!-- card ends here -->
            </div>      <!-- wrapper ends here -->
        </div>      <!-- row ends here -->
    </div>      <!-- col-12 ends here -->


@stop