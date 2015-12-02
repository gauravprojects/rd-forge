@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Manufacturers</span>
                        </div>
                    </div>

                    <div class="row" id="left-col">

                        <table>
                            <tr class="heading">
                                <th>No</th>
                                <th>Manufacturer's Name</th>
                                <th>Item</th>
                                <th>Action</th>
                            </tr>
                            <?php $count=0; ?>
                            @foreach($data as $manufac_data)
                                <tr>
                                    <td>{{ ++$count; }}</td>
                                    <td>{{ $manufac_data->manufacturer_name }}</td>
                                    <td>{{ $manufac_data->item }}</td>
                                    <td>
                                        <div class="span9 btn-block excelPrint">
                                            <button class="btn btn-small btn-block" type="button" id="excel_button">
                                                <a href="{{ action('masterController@deleteManufacturer',array('id'=>$manufac_data->id));}}" class="link" >Delete</a>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>		<!-- row conatining form ends here -->
                    <div class="row" id="right-col">

                        <p class="heading">Add Manufacturer's here</p>
                        {{ Form::open(array('action'=> 'masterController@storeManufacturers')) }}
                                <!-- For recipt number of the material coming from outside -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Manufacturer Name') }}
                            {{ Form::text('manufacturer_name',null,array('class'=>'form-control inputfix','placeholder'=>'Manufacturer name','id'=>'anything')) }}
                        </div>

                        <div class="form-group">
                        {{ Form::label('exampleInputPassword','Item') }}

                        <select class="form-control" name="item">

                            <option value="Ingot">Ingot</option>
                            <option value="F.O.">F.O.</option>
                            <option value="Blooms">Blooms</option>
                            <option value="Die Forging">Die Forging</option>
                            <option value="Shaft">Shaft</option>
                        </select>
                        </div>

                        <div class="loginButton">

                        <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Add Manufacturers</button>

                        </div>
                        {{ Form::close() }}
                    </div>


                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop