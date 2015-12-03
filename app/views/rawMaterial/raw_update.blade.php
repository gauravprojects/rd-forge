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
                                {{ Form::label('exampleInputEmail1','Internal Number') }}
                                {{ Form::text('internal_no',$data->internal_no,array('class'=>'form-control inputfix','placeholder'=>'Internal No (non editable)','id'=>'exampleInputEnail1')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Receipt Code') }}
                                {{ Form::text('receiptCode',$data->receipt_code,array('class'=>'form-control inputfix','placeholder'=>'Receipt Number','id'=>'exampleInputEnail1')) }}
                            </div>

                             <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Date') }}
                                {{ Form::text('date',$data->date,array('class'=>'form-control inputfix','id'=>'date','name'=>'date','placeholder'=>'Date','readonly')) }}
                            </div>

                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->

                            <!-- For the size of the coming raw material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Size') }}
                                {{ Form::text('size',$data->size,array('class'=>'form-control inputfix','placeholder'=>'Size','id'=>'justAnything')) }}
                            </div>

                            <!-- Manufacturer's name -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Manufacturer') }}
                                {{ Form::text('Manufacturer',$data->manufacturer,array('class'=>'form-control inputfix','placeholder'=>'Manufacturer Name','id'=>'JustAnything2')) }}
                            </div>

                            <!-- Heat no, unique number for every order -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Heat Number') }}
                                {{ Form::text('heatNo',$data->heat_no,array('class'=>'form-control inputfix','placeholder'=>'Heat Number','id'=>'Justesehe')) }}
                            </div>
                            <!-- Wieght, weight of the incmomh material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight') }}
                                {{ Form::text('weight',$data->weight,array('class'=>'form-control inputfix','placeholder'=>'Weight','id'=>'Justesehe')) }}
                            </div>

                            <!-- left over weight -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Left over weight') }}
                                {{ Form::text('left_over_weight',$data->left_over_weight,array('class'=>'form-control inputfix','placeholder'=>'Left over weight','id'=>'Justesehe')) }}
                            </div>

                            <!-- Purchase order no -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Number') }}
                                {{ Form::text('purchaseNo',$data->pur_order_no,array('class'=>'form-control inputfix','placeholder'=>'Purchase Order No','id'=>'JustAnything')) }}
                            </div>

                            <!-- Purchase order date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Purchase Order Date') }}
                                {{ Form::text('purchaseDate',$data->pur_order_date,array('class'=>'form-control inputfix','id'=>'purchaseDate','name'=>'purchaseDate','placeholder'=>'Purchase Order Date','readonly')) }}
                            </div>

                            <!-- Invoice Number -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Number') }}
                                {{ Form::text('invoiceNo',$data->invoice_no,array('class'=>'form-control inputfix','placeholder'=>'Invoice Number','id'=>'JustAnything')) }}
                            </div>

                            <!-- Inovice date -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Invoice Date') }}
                               {{ Form::text('invoiceDate',$data->invoice_date,array('class'=>'form-control inputfix','id'=>'invoiceDate','name'=>'invoiceDate','placeholder'=>'Invoice Date','readonly')) }}
                            </div>

                            @endforeach
                            <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                            waiting for sample data to work further on this -->
                            <div class="form-group">
                                <!-- PROBLEM THIS form::select() NOT WORKING.. PLEASE CHECK IT OUT -->

                                {{ Form::label('exampleInputPassword','Material Grade') }}

                               <select class="form-control" name="materialGrade">
                                        @foreach($grades as $grade_element)
                                            <option value="{{ $grade_element->grade_name }}">{{$grade_element->grade_name}}</option>
                                        @endforeach
                                    </select>

                            </div>

                            <!-- raw material type, these sample types will be provided.. to be implemented using dropdown -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type of Material</label>
                                <select class="form-control" name="materialType">
                                    <option value="Ingot">Ingot</option>
                                    <option value="Round">Round</option>
                                    <option value="Bloom">Bloom</option>
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
    });
</script>


@stop