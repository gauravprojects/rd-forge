@extends('default.layout')


@section('content')
                        <span>Raw Material Entry</span>

                        {{ Form::label('email', 'E-Mail Address');}}

                    </div>
                </div>

                <div class="row">
                    <form>
                        <!-- For recipt number of the material coming from outside -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Receipt Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Receipt Number">
                        </div>

                        <!-- For the date of entry of raw materail
                            This date will be picket up using date() function from the machine -->

                        <!-- For the size of the coming raw material -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Size</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Size">
                        </div>

                        <!-- Wieght, weight of the incmomh material -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Weight">
                        </div>

                        <!-- Manufacturer's name -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Manufacturer</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Manufacturer">
                        </div>
                        <!-- Heat no, Every incoming raw material has a unique heat no -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Heat no</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Heat no">
                        </div>

                        <!-- Purchase order no -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Purchase Order Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Purchase order no">
                        </div>

                        <!-- Purchase order date -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Purchase Order Date</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Purcahse Order date">
                        </div>

                        <!-- Invoice Number -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Invoice no</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="invoice no">
                        </div>

                        <!-- Inovice date -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Invoice date</label>
                            <input type="date" class="form-control" id="exampleInputEmail1" placeholder="Inoice date">
                        </div>

                        <!-- Material grade, this will be prementioned, using dropdowm they will be shown
                        waiting for sample data to work further on this -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Material Grade</label>
                            <select class="form-control">
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
                            <select class="form-control">
                                <option>Type 1</option>
                                <option>Type 2</option>
                                <option>Type 3</option>
                                <option>Type 4</option>
                                <option>Type 5</option>
                            </select>
                        </div>


                        <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a>
                    </form>
@stop