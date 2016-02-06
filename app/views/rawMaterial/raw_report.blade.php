@extends('layouts.master')

@section('links_data')

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
    <div class="wrapper wrapperRawReport">
            <div class="card">
                <div class="row text-center">
                    <div class="heading">
                        <span>Raw Material Report</span>
                    </div>
                </div>


                @if($raw)

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
                            <th>Update/Delete</th>

                        </tr>

                        
                            @foreach($raw as $raw_data)
                                <tr>
                                    <td>{{{ $raw_data->internal_no }}}</td>
                                    <td>{{{ $raw_data->receipt_code }}}</td>
                                    <td>{{{ date('d-m-Y',strtotime($raw_data->date)) }}}</td>
                                    <td>{{{ $raw_data->size }}}</td>
                                    <td>{{{ $raw_data->manufacturer }}}</td>
                                    <td>{{{ $raw_data->heat_no }}}</td>
                                    <td>{{{ $raw_data->weight }}}</td>
                                    <td>{{{ $raw_data->material_grade }}}</td>
                                    <td>{{{ $raw_data->raw_material_type }}}</td>
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



                    <div class="span9 btn-block excelPrint">
                     
                            <a href="<?php echo  route('raw.excel'); ?>" class="btn btn-small btn-block" >Generate Report in Excel</a>
                      
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