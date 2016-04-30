@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Standard Pressure Values</span>
                        </div>
                    </div>

                    <div class="row" id="left-col">

                        <table>
                            <tr class="heading">
                                <th>S.No</th>
                                <th>Pressure</th>
                                <th>Action</th>
                            </tr>
                            <?php $count=0; ?>
                            @foreach($data as $pressure_data)
                                <tr>
                                    <td>{{ ++$count; }}</td>
                                    <td>{{ $pressure_data->pressure }}</td>
                                    <td>
                                        <div class="span9 btn-block excelPrint">
                                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                                <a href="{{ action('masterController@deletePressure',array('id'=>$pressure_data->id));}}" class="link" >Delete</a>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>		<!-- row conatining form ends here -->
                    <div class="row" id="right-col">

                        <p class="heading">Add Pressures here</p>
                        {{ Form::open(array('action'=> 'masterController@storePressure')) }}
                                <!-- For recipt number of the material coming from outside -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Pressure') }}
                            {{ Form::text('pressure',null,array('class'=>'form-control inputfix','placeholder'=>'Pressure value','id'=>'anything','required')) }}
                        </div>

                        <div class="loginButton">

                        <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Add Pressure</button>

                        </div>
                        {{ Form::close() }}
                    </div>


                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop