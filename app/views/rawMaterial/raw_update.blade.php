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


                    @foreach($data_array as $data)
                        <div class="row">
                            {{ Form::open(array('action'=> 'rawMaterialController@update_store')) }}
                                    <!-- For recipt number of the material coming from outside -->

                            <div class="form-group">
                                {{ Form::hidden('internal_no',$data->internal_no,array('class'=>'form-control inputfix','placeholder'=>'Internal No (non editable)','id'=>'exampleInputEnail1')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Receipt Code') }}
                                {{ Form::text('receiptCode',$data->receipt_code,array('class'=>'form-control inputfix','placeholder'=>'Receipt Number','id'=>'exampleInputEnail1')) }}
                            </div>

                             <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                {{ Form::text('date',date('d-m-Y',strtotime($data->date)),array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->

                            <!-- For the size of the coming raw material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Size') }}

                                   <select class="form-control search selection" id="size_select" name="size">
                                    <option value="">---Select Size--------</option>
                                    @foreach($sizes as $size_element)
                                        @if($size_element->size == $data->size)
                                            <option value="{{ $size_element->size }}" selected>{{$size_element->size}}</option>
                                            <?php $old_size = $size_element->size; ?>
                                        @else
                                            <option value="{{ $size_element->size }}">{{$size_element->size}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                  {{ Form::hidden('old_size',$old_size,array('class'=>'form-control inputfix')) }}

                            </div>

                            <!-- Manufacturer's name -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Manufacturer') }}
                                <select class="form-control search selection" id="manufacturer_select" name="Manufacturer" required>
                                    <option value="">---Select Manufacturer--------</option>
                                     @foreach($manufacturers as $manufacturer_element)
                                        @if($manufacturer_element->manufacturer_name == $data->manufacturer)
                                            <option value="{{ $manufacturer_element->manufacturer_name }}" selected>{{$manufacturer_element->manufacturer_name}}</option>
                                        @else
                                            <option value="{{ $manufacturer_element->manufacturer_name }}">{{$manufacturer_element->manufacturer_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Heat no, unique number for every order -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number') }}
                                {{ Form::text('heatNo',$data->heat_no,array('class'=>'form-control inputfix','placeholder'=>'Heat Number','id'=>'Justesehe')) }}

                                 <?php $old_heat_no = $data->heat_no; ?>

                                {{ Form::hidden('old_heat_no',$old_heat_no,array('class'=>'form-control inputfix')) }}
                                   
                            </div>
                            <!-- Wieght, weight of the incmomh material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',$data->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'Justesehe')) }}
                            </div>


                            <!-- Purchase order no -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Number') }}
                                {{ Form::text('purchaseNo',$data->pur_order_no,array('class'=>'form-control inputfix','placeholder'=>'Purchase Order No','id'=>'JustAnything')) }}
                            </div>

                            <!-- Purchase order date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                                {{ Form::text('purchaseDate',date('d-m-Y',strtotime($data->pur_order_date)),array('class'=>'form-control inputfix','id'=>'purchaseDate','name'=>'purchaseDate','placeholder'=>'Purchase Order Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            <!-- Invoice Number -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Number') }}
                                {{ Form::text('invoiceNo',$data->invoice_no,array('class'=>'form-control inputfix','placeholder'=>'Invoice Number','id'=>'JustAnything')) }}
                            </div>

                            <!-- Inovice date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Date') }}
                               {{ Form::text('invoiceDate',date('d-m-Y',strtotime($data->invoice_date)),array('class'=>'form-control inputfix','id'=>'invoiceDate','name'=>'invoiceDate','placeholder'=>'Invoice Date','readonly','data-date-format'=>'dd-mm-yyyy')) }}
                            </div>

                            @endforeach
                            <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                            waiting for sample data to work further on this -->
                            <div class="form-group">
                                <!-- PROBLEM THIS form::select() NOT WORKING.. PLEASE CHECK IT OUT -->

                                {{ Form::label('exampleInputPassword','Material Grade') }}

                               <select class="form-control search selection" id="grade_select" name="materialGrade">
                                <option value="">---Select Grade--------</option>
                                        @foreach($grades as $grade_element)
                                            @if($grade_element->grade_name == $data->material_grade)
                                                    <option value="{{ $grade_element->grade_name }}" selected>{{$grade_element->grade_name}}</option>
                                            @else
                                                     <option value="{{ $grade_element->grade_name }}">{{$grade_element->grade_name}}</option>
                                            @endif

                                        @endforeach
                                    </select>

                            </div>

                            <!-- raw material type, these sample types will be provided.. to be implemented using dropdown -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type of Material</label>
                                <select class="form-control" name="materialType" id="material_type_select" required>
                                    <option value="">---Select Material Type--------</option>
                                     @foreach($material_type as $material_type_element)
                                            @if($material_type_element->material_type == $data->raw_material_type)
                                                    <option value="{{ $material_type_element->material_type }}" selected>{{$material_type_element->material_type}}</option>
                                            @else
                                                     <option value="{{ $material_type_element->material_type }}">{{$material_type_element->material_type}}</option>
                                            @endif

                                        @endforeach
                                </select>
                            </div>

                            
                                

                                 <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>
                        
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