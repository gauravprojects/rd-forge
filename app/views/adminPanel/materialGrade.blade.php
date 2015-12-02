@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Material Grades</span>
                        </div>
                    </div>

                    <div class="row" id="left-col">

                        <table>
                            <tr class="heading">
                                <th>No</th>
                                <th>Grades</th>
                                <th>Action</th>
                            </tr>
                            <?php $count=0; ?>
                            @foreach($data as $grades_data)
                                <tr>
                                    <td>{{ ++$count; }}</td>
                                    <td>{{ $grades_data->grade_name }}</td>
                                    <td>
                                        <div class="span9 btn-block excelPrint">
                                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                                <a href="{{ action('masterController@deleteGrades',array('id'=>$grades_data->id));}}" class="link" >Delete</a>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>		<!-- row conatining form ends here -->
                    <div class="row" id="right-col">

                        <p class="heading">Add Grade here</p>
                        {{ Form::open(array('action'=> 'masterController@storeGrades')) }}
                                <!-- For recipt number of the material coming from outside -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Grade Name') }}
                            {{ Form::text('grade_name',null,array('class'=>'form-control inputfix','placeholder'=>'Material Grade name','id'=>'anything')) }}
                        </div>

                        <div class="loginButton">

                        <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Add Grades</button>

                        </div>
                        {{ Form::close() }}
                    </div>


                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop