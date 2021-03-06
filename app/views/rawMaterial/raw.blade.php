@extends('layouts.master')

@section('links_data')

    <br><br>
    <a href="{{route('raw.report')}} " class="waves-effect waves-light btn link right">Raw Material reports</a>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:-80px;">
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
                                {{ Form::text('receiptCode',null,array('class'=>'form-control inputfix','placeholder'=>'Receipt Number','id'=>'exampleInputEnail1')) }}
                            </div>

                        
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                {{ Form::text('date',null,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>
                  
                        
                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->


                        <div class="form-group">
                            {{ Form::label('exampleInputEmail1','Size') }}

                            <select class="form-control search selection" id="size_select" name="size" required>
                                <option value="">---Select Size--------</option>
                                @foreach($sizes as $size_element)
                                    <option value="{{ $size_element->size }}">{{$size_element->size}}</option>
                                @endforeach
                            </select>
                         </div>

                            <!-- Manufacturer's name -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Manufacturer') }}
                                <select class="form-control search selection" id="manufacturer_select" name="Manufacturer" required>
                                    <option value="">---Select Manufacturer--------</option>
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



                            <!-- Purchase order no -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Number') }}
                                {{ Form::text('purchaseNo',null,array('class'=>'form-control inputfix','placeholder'=>'Purchase Order No','id'=>'JustAnything')) }}
                            </div>

                            <!-- Purchase order date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                                {{ Form::text('purchaseDate',null,array('class'=>'form-control inputfix','id'=>'purchaseDate','name'=>'purchaseDate','placeholder'=>'Purchase Order Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <!-- Invoice Number -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Number') }}
                                {{ Form::text('invoiceNo',null,array('class'=>'form-control inputfix','placeholder'=>'Invoice Number','id'=>'JustAnything')) }}
                            </div>

                            <!-- Inovice date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Date') }}
                                {{ Form::text('invoiceDate',null,array('class'=>'form-control inputfix','id'=>'invoiceDate','name'=>'invoiceDate','placeholder'=>'Invoice Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                            waiting for sample data to work further on this -->

                                <div class="form-group">
                                    {{ Form::label('exampleInputEmail1','Material Grade') }}

                                    <select class="form-control search selection" id="grade_select" name="materialGrade" required>
                                        <option value="">---Select Grade--------</option>
                                        @foreach($grades as $grade_element)
                                            <option value="{{ $grade_element->grade_name }}">{{$grade_element->grade_name}}</option>
                                        @endforeach
                                    </select>
                                </div>




                            <!-- raw material type, these sample types will be provided.. to be implemented using dropdown -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type of Material</label>
                                <select class="form-control search selection" name="materialType" id="material_type_select" required>
                                    <option value="">---Select Material type--------</option>
                                    @foreach($material_type as $material_type_element)
                                            <option value="{{ $material_type_element->material_type }}">{{$material_type_element->material_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="loginButton">

                            <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal submit" type="submit">Submit</button>

                            </div>
                        {{ Form::close() }}


                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

 <script type="text/javascript">
    $(function () {
        $('#date').datepicker();
        $("#purchaseDate").datepicker();
        $("#invoiceDate").datepicker();
        $('#size_select').dropdown();
        $('#grade_select').dropdown();
        $('#manufacturer_select').dropdown();
        $('#material_type_select').dropdown();

        
    });

</script>

@stop