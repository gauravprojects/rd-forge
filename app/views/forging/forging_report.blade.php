@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Forging Report</span>
                        </div>
                    </div>


                @if($forging_data)

                    <?php $serial_number = 1; ?>
                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>S.No</th>
                                <th>Date</th>
                                <th>Heat no</th>
                                <th>Weight per peice</th>
                                <th>Quantity</th>
                                <th>Total Weight</th>
                                <th>Size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Remarks</th>
                                <th>Update/Delete</th>
                            </tr>

                        @foreach($forging_data as $confirmation)
                            <tr>
                                <td>{{ $serial_number++ }}</td>
                                <td>{{ date('d-m-Y',strtotime($confirmation->date)) }}</td>
                                <td>{{ $confirmation->heat_no }}</td>
                                <td>{{ $confirmation->weight_per_piece }}</td>
                                <td>{{ $confirmation->quantity }}</td>
                                <td>{{ $confirmation->total_weight }}</td>
                                <td>{{ $confirmation->size }}</td>
                                <td>{{ $confirmation->pressure }}</td>
                                <td>{{ $confirmation->type }}</td>
                                <td>{{ $confirmation->schedule }}</td>
                                <td>{{ $confirmation->remarks }}</td>
                                <td>
                                    <!-- Update link -->
                                    <a href="{{ action('forgingController@update',array('id'=>$confirmation->forging_id))}}" class="link" >Update</a>

                                    <!-- Delete link -->
                                    <a href="{{ action('forgingController@destroy',array('id'=>$confirmation->forging_id))}}" class="link" >Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </table>

                        <div class="span9 btn-block excelPrint">
                            
                                <a href="<?php echo  route('forging.excel'); ?>" class="btn btn-small btn-block" >Generate Report in Excel</a>
                          
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