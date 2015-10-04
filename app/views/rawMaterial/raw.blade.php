@extends('layouts.master')

@section('links_data')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Raw Material Entry</span>
                        </div>
                    </div>

                    <div class="row">
                       {{ Form::open(array('action'=> 'rawMaterialController@store')) }}
                            <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Receipt Code') }}
                                {{ Form::text('receiptCode',null,array('class'=>'form-control','placeholder'=>'Receipt Number','id'=>'exampleInputEnail1')) }}
                            </div>

                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->

                            <!-- For the size of the coming raw material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Size') }}
                                {{ Form::text('size',null,array('class'=>'form-control','placeholder'=>'size','id'=>'justAnything')) }}
                            </div>

                            <!-- Manufacturer's name -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Manufacturer') }}
                                {{ Form::text('Manufacturer',null,array('class'=>'form-control','placeholder'=>'Manufacturer Name','id'=>'JustAnything2')) }}
                            </div>

                            <!-- Heat no, unique number for every order -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number') }}
                                {{ Form::text('heatNo',null,array('class'=>'form-control','placeholder'=>'Heat Number','id'=>'Justesehe')) }}
                            </div>
                            <!-- Wieght, weight of the incmomh material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',null,array('class'=>'form-control','placeholder'=>'Weight','id'=>'Justesehe')) }}
                            </div>

                            <!-- Purchase order no -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Number') }}
                                {{ Form::text('purchaseNo',null,array('class'=>'form-control','placeholder'=>'Purchase Order No','id'=>'JustAnything')) }}
                            </div>

                            <!-- Purchase order date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                                {{ Form::input('date', 'purchaseDate') }}
                            </div>

                            <!-- Invoice Number -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Number') }}
                                {{ Form::text('invoiceNo',null,array('class'=>'form-control','placeholder'=>'Invoice Number','id'=>'JustAnything')) }}
                            </div>

                            <!-- Inovice date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Date') }}
                                {{ Form::input('date', 'invoiceDate') }}
                            </div>

                            <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                            waiting for sample data to work further on this -->
                            <div class="form-group">
                                <!-- PROBLEM THIS form::select() NOT WORKING.. PLEASE CHECK IT OUT -->

                                {{ Form::label('exampleInputPassword','Material Grade') }}


                                <select class="form-control" name="materialGrade">
                                    <option>Grade 1</option>
                                    <option>Grade 2</option>
                                    <option>Grade 3</option>
                                    <option>Grade 4</option>
                                    <option>Grade 5</option>
                                </select>
                            </div>

                            <!-- raw material type, these sample types will be provided.. to be implemented using dropdown -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Material Type</label>
                                <select class="form-control" name="materialType">
                                    <option>Type 1</option>
                                    <option>Type 2</option>
                                    <option>Type 3</option>
                                    <option>Type 4</option>
                                    <option>Type 5</option>
                                </select>
                            </div>


                            <div class="loginButton">

                        {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }}
                            </div>
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop