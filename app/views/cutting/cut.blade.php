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
                        <form>
                            <!-- For the date of entry of raw materail
                                This date will be picket up using date() function from the machine -->

                            <!-- For the size of the coming raw material.. here size means raw material size -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Size</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Size">
                            </div>


                            <!-- Heat no, Every incoming raw material has a unique heat no -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Heat no</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Heat no">
                            </div>

                            <!-- qunanity.. this is the quantity of the cutted material -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Qunatity</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Qunatity">
                            </div>

                            <!-- Wieght per piece,, weight per piece of the cutted material -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Weight per piece</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Weight per piece">
                            </div>

                            <!-- total weight to be calculated by itself
                                total weight= quantity * Weight per piece -->

                            <!-- cutting item description  -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cutting item discription</label>
                                <input class="form-control input-lg" id="inputlg" type="text" placeholder="Cutting item description">
                            </div>

                            <!-- cutting remarks.. optional if user has some additional thing then he can mention it here -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cutting item remarks</label>
                                <input class="form-control input-lg" id="inputlg" type="text" placeholder="Cutting item remarks">
                            </div>



                            <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a>
                        </form>
                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->


@stop