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
                                <th>Size</th>
                                <th>Standard size</th>
                                <th>Pressure</th>
                                <th>Type</th>
                                <th>Schedule</th>
                                <th>Heat No</th>
                                <th>Quantity</th>
                                <th>Weight per piece</th>
                                <th>Total Weight</th>

                            </tr>
                            @foreach($confirmations as $confirmation)
                            <tr>
                                <td>{{date('d-m-Y',strtotime($confirmation->date))}}</td>
                                <td>{{$confirmation->raw_mat_size}}</td>
                                <td>{{$confirmation->size}}</td>
                                <td>{{$confirmation->pressure }}</td>
                                <td>{{$confirmation->type }}</td>
                                <td>{{$confirmation->schedule}}</td>
                                <td>{{$confirmation->heat_no }}</td>
                                <td>{{$confirmation->quantity}}</td>
                                <td>{{$confirmation->weight_per_piece}}</td>
                                <td>{{$confirmation->total_weight}}</td>
                            </tr>
                            @endforeach



                        </table>

                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('cuttingPageController@update',array('id'=>$confirmation->cutting_id))}}" class="link" >Update</a>
                            </button>
                        </div>
                         <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('cuttingPageController@index')  }}" class="link" >New Cutting Entry</a>
                            </button>
                        </div>
                        <br><br><br><br>
                    </div>      <!-- row conatining form ends here -->
                </div>      <!-- card ends here -->
            </div>      <!-- wrapper ends here -->
        </div>      <!-- row ends here -->
    </div>      <!-- col-12 ends here -->

@stop