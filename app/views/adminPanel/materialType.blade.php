@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Material Types</span>
                        </div>
                    </div>

                    <div class="row" id="left-col">

                        <table>
                            <tr class="heading">
                                <th>S.No</th>
                                <th>Material Types</th>
                                <th>Action</th>
                            </tr>
                            <?php $count=0; ?>
                            @foreach($data as $material_types_data)
                                <tr>
                                    <td>{{ ++$count; }}</td>
                                    <td>{{ $material_types_data->material_type }}</td>
                                    <td>
                                        <div class="span9 btn-block excelPrint">
                                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                                <a href="{{ action('masterController@deleteMaterialType',array('id'=>$material_types_data->id));}}" class="link" >Delete</a>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>		<!-- row conatining form ends here -->
                    <div class="row" id="right-col">

                        <p class="heading">Add Material Type here</p>
                        {{ Form::open(array('action'=> 'masterController@storeMaterialType')) }}
                                <!-- For recipt number of the material coming from outside -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Material Type Name') }}
                            {{ Form::text('material_type',null,array('class'=>'form-control inputfix','placeholder'=>'Material Type name','id'=>'anything','required')) }}
                        </div>

                        <div class="loginButton">

                        <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Add Material Type</button>

                        </div>
                        {{ Form::close() }}
                    </div>


                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop