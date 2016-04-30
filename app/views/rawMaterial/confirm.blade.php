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
                                <th>Receipt Code</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Manufacturer</th>
                                <th>Heat No</th>
                                <th>Weight</th>
                                <th>Material Type</th>
                                <th>Material Grade</th>
                                <th>Available Weight</th>

                            </tr>

                            <tr>
                                <td>{{ $confirmation->receipt_code }}</td>
                                <td>{{ date('d-m-Y',strtotime($confirmation->date)) }}</td>
                                <td>{{ $confirmation->size }}</td>
                                <td>{{ $confirmation->manufacturer }}</td>
                                <td>{{ $confirmation->heat_no }}</td>
                                <td>{{ $confirmation->weight }}</td>
                                <td>{{ $confirmation->raw_material_type }}</td>
                                <td>{{ $confirmation->material_grade }}</td>
                                <td>{{ $confirmation->available_weight }}</td>
                            </tr>

                        </table>

                        <div class="span9 btn-block excelPrint">
                            <!-- update button -->
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('rawMaterialController@update',array('id'=>$confirmation->internal_no))}}" class="link" >Update</a>
                            </button>

                        </div>
                        <div class="span9 btn-block excelPrint">
                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                <a href="{{ action('rawMaterialController@index')  }}" class="link" >New Raw Material Entry</a>
                            </button>
                        </div>
                        <br><br><br><br>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

@stop