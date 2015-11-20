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
                                {{ Form::text('receiptCode',null,array('class'=>'form-control  inputfix','placeholder'=>'Receipt Number','id'=>'exampleInputEnail1')) }}
                            </div>

                        <div class="form-group inputfix">
                            {{ Form::label('exampleInputEmail1','Date') }}
                            {{ Form::input('date', 'date') }}
                        </div>

                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Size') }}

                            <select class="form-control inputfix" name="size">
                                @foreach($sizes as $size_element)
                                    <option value="{{ $size_element->size }}">{{$size_element->size}}</option>
                                @endforeach
                            </select>
                         </div>

                            <!-- Manufacturer's name -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Manufacturer') }}

                                <select class="form-control inputfix" name="Manufacturer">
                                    @foreach($manufacturers as $manufacturer_element)
                                        <option value="{{ $manufacturer_element->manufacturer_name }}">{{$manufacturer_element->manufacturer_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Heat no, unique number for every order -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number') }}
                                {{ Form::text('heatNo',null,array('class'=>'form-control inputfix','placeholder'=>'Heat Number','id'=>'Justesehe')) }}
                            </div>
                            <!-- Wieght, weight of the incmomh material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',null,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'Justesehe')) }}
                            </div>

                            <!-- left over weight -->
                            <div class="form-group inputfix">
                                {{ Form::label('exampleInputEmail1','Left over weight') }}
                                {{ Form::text('left_over_weight',null,array('class'=>'form-control inputfix','placeholder'=>'Left over weight','id'=>'Justesehe')) }}
                            </div>

                            <!-- Purchase order no -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Number') }}
                                {{ Form::text('purchaseNo',null,array('class'=>'form-control inputfix','placeholder'=>'Purchase Order No','id'=>'JustAnything')) }}
                            </div>

                            <!-- Purchase order date -->
                            <div class="form-group inputfix">
                                {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                                {{ Form::input('date', 'purchaseDate') }}
                            </div>

                            <!-- Invoice Number -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Number') }}
                                {{ Form::text('invoiceNo',null,array('class'=>'form-control inputfix','placeholder'=>'Invoice Number','id'=>'JustAnything')) }}
                            </div>

                            <!-- Inovice date -->
                            <div class="form-group inputfix">
                                {{ Form::label('exampleInputEmail','Invoice Date') }}
                                {{ Form::input('date', 'invoiceDate') }}
                            </div>

                            <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                            waiting for sample data to work further on this -->

                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail1','Grades') }}

                                    <select class="form-control inputfix" name="materialGrade">
                                        @foreach($grades as $grade_element)
                                            <option value="{{ $grade_element->grade_name }}">{{$grade_element->grade_name}}</option>
                                        @endforeach
                                    </select>
                                </div>




                            <!-- raw material type, these sample types will be provided.. to be implemented using dropdown -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Material Type</label>
                                <select class="form-control" name="materialType">
                                    <option value="Ingot">Ingot</option>
                                    <option value="Round">Round</option>
                                    <option value="Bloom">Bloom</option>
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