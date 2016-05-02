@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <br><br>
                            <span>Form submited successfully with following details</span>
                            <br><br>
                        </div>
                    </div>

                    <div class="row">
                        <table>
                            <tr class="heading">
                                <th>Date</th>
                                <th>Weight per peice</th>
                                <th>Heat no</th>
                                <th>Standard Size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Quantity</th>
                                <th>Total Weight</th>
                            </tr>

                           @for($p = 0; $p < count(explode(',',$last_record->size)); $p++) 
                                <tr>
                                    <td>{{ date('d-m-Y',strtotime($last_record->date)) }}</td>
                                    <td>{{ $last_record->weight_per_piece }}</td>
                                    <td>{{ $last_record->heat_no }}</td>
                                    <td> {{ explode(',',$last_record->size)[$p] }}</td>
                                    <td>{{ explode(',',$last_record->pressure)[$p] }}</td>
                                    <td>{{ explode(',',$last_record->type)[$p] }}</td>
                                    <td> {{ explode(',',$last_record->schedule)[$p] }}</td>
                                    <td>{{ $last_record->quantity }}</td>
                                    <td>{{ $last_record->total_weight }}</td>
                                </tr>
                            @endfor
                        </table>
                        
                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('forgingController@update',array('id'=>$last_record->forging_id))}}" class="link" >Update</a>
                            </button>
                            
                        </div>
                         <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('forgingController@index')  }}" class="link" >New Forging Entry</a>
                            </button>
                        </div>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop