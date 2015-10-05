@extends('layouts.master')

@section('links_data')

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <div class="wrapper">
                <div class="card">
                    <div class="row text-center">
                        <div class="heading">
                            <span>Cutting Entry</span>
                        </div>
                    </div>

                    <div class="row">
                        {{ Form::open(array('action'=>'cuttingPageController@store')) }}
                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->

                            <!-- For the size of the coming raw material.. here size means raw material size -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Size') }}
                                {{ Form::text('size',null,array('class'=>'form-control','placeholder'=>'Size','id'=>'JustAnything')) }}
                            </div>


                            <!-- Heat no, Every incoming raw material has a unique heat no -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Heat no') }}
                                {{ Form::text('heatNo',null,array('class'=>'form-control','placeholder'=>'Heat Number','id'=>'JustAnything')) }}
                            </div>

                            <!-- qunanity.. this is the quantity of the cutted material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Qunatity') }}
                                {{ Form::text('quantity',null,array('class'=>'form-control','placeholder'=>'Quantity','id'=>'JustAnything')) }}
                            </div>

                            <!-- Wieght per piece,, weight per piece of the cutted material -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail1','Weight per Pice') }}
                                {{ Form::text('wpp',null,array('class'=>'form-control','placeholder'=>'Weight per piece')) }}
                            </div>

                            <!-- total weight to be calculated by itself
                                total weight= quantity * Weight per piece -->

                            <!-- cutting item description  -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Cutting Item Discription') }}
                                {{ Form::text('CutDes',null,array('class'=>'form-control','placeholder'=>'Cutting item Discription','id'=>'JustAnything')) }}
                            </div>

                            <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->
                            <div class="form-group">
                                {{ Form::label('exampleInputEmail','Cutting item remarks') }}
                                {{ Form::text('cutRem',null,array('class'=>'form-control','placeholder'=>'Cutting item remarks','id'=>'JustAnything')) }}
                            </div>


                            {{ Form::submit('Submit',array('class'=>'waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button')) }}
                           <!-- Given by pranav
                            <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a> -->
                        {{ Form::close() }}
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop