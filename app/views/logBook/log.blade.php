<html>
<head>
    <title>RD-Forge| Log Table</title>
    <!-- materialize starts -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
    <!-- materialize ends -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    {{ HTML::style('css/indexLog.css') }}
    {{ HTML::style('css/logMod.css') }}
</head>


<table>
</tr>

@foreach($data as $raw => $raw_data)
    @foreach($raw_data as $indivisual)


        <tr>
            <td>{{ $indivisual->internal_no }}</td>
            <td>{{ $indivisual->receipt_code }}</td>
            <td>{{ $indivisual->size }}</td>
            <td>{{ $indivisual->manufacturer }}</td>
            <td>{{ $indivisual->heat_no }}</td>
            <td>{{ $indivisual->weight }}</td>
            <td>{{ $indivisual->left_over_weight }}</td>
            <td>{{ $indivisual->material_grade }}</td>
            <td>{{ $indivisual->raw_material_type }}</td>
            {{ dd() }}
        </tr>

    @endforeach
@endforeach
</table>

<body>

<!-- container starts -->
<div class="container">
    <ul class="tabContainer row">
        <!-- change the values of col-md-lg-xs accoridng to the number of categories you want in the categories -->
        <a href="#tab1" onclick="showTab1()"><li id="tab11" class="tab1 col-lg-3 col-md-3 col-sm-3 col-xs-3">Raw Material</li></a>
        <a href="#tab2" onclick="showTab2()"><li id="tab22" class="tab1 col-lg-3 col-md-3 col-sm-3 col-xs-3">Cutting</li></a>
        <a href="#tab3" onclick="showTab3()"><li id="tab33" class="tab1 col-lg-3 col-md-3 col-sm-3 col-xs-3">Forging</li></a>
        <a href="#tab4" onclick="showTab4()"><li id="tab44" class="tab1 col-lg-3 col-md-3 col-sm-3 col-xs-3">Work Order</li></a>
    </ul>
    <!-- content container starts -->
    <div class="contentContainer">
        <div id="tab1" class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="wrapper">
                        <div class="card">
                            <div class="row text-center">
                                <div class="heading">






                                    <span>Raw Material Log Book</span><br>
                                    <span>Date: {{ date("Y-m-d") }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <table>
                                        <tr class="heading">
                                            <th>Internal Number</th>
                                            <th>Recipet Code</th>
                                            <th>Size</th>
                                            <th>Manufacturer</th>
                                            <th>Heat No</th>
                                            <th>Weight</th>
                                            <th>Left Over Weight</th>
                                            <th>Material Type</th>
                                            <th>Material Grade</th>

                                        </tr>
                                        @foreach($data as $raw => $raw_data)
                                            @foreach($raw_data as $indivisual)


                                                <tr>
                                                    <td>{{ $indivisual->internal_no }}</td>
                                                    <td>{{ $indivisual->receipt_code }}</td>
                                                    <td>{{ $indivisual->size }}</td>
                                                    <td>{{ $indivisual->manufacturer }}</td>
                                                    <td>{{ $indivisual->heat_no }}</td>
                                                    <td>{{ $indivisual->weight }}</td>
                                                    <td>{{ $indivisual->left_over_weight }}</td>
                                                    <td>{{ $indivisual->material_grade }}</td>
                                                    <td>{{ $indivisual->raw_material_type }}</td>
                                                    {{ dd() }}
                                                </tr>

                                            @endforeach
                                        @endforeach



                                    </table>

                            </div>


                            </div>		<!-- row conatining form ends here -->
                        </div>		<!-- card ends here -->
                    </div>		<!-- wrapper ends here -->
                </div>		<!-- row ends here -->
            </div> 		<!-- col-12 ends here -->
        </div> 		<!-- tab1 card ends -->

        <div id="tab2" class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="wrapper">
                        <div class="card">
                            <div class="row text-center">
                                <div class="heading">
                                    <span>Lorem Ipsum Doler</span>
                                </div>
                            </div>

                            <div class="row">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name of material</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Steel">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Material</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose weight</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Quantitiy</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Something</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>


                                    <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a>
                                </form>
                            </div>		<!-- row conatining form ends here -->
                        </div>		<!-- card ends here -->
                    </div>		<!-- wrapper ends here -->
                </div>		<!-- row ends here -->
            </div> 		<!-- col-12 ends here -->
        </div> 		<!-- tab2 card ends -->

        <div id="tab3" class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="wrapper">
                        <div class="card">
                            <div class="row text-center">
                                <div class="heading">
                                    <span>Lorem Ipsum Doler</span>
                                </div>
                            </div>

                            <div class="row">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name of material</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Steel">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Material</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose weight</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Quantitiy</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Something</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>


                                    <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a>
                                </form>
                            </div>		<!-- row conatining form ends here -->
                        </div>		<!-- card ends here -->
                    </div>		<!-- wrapper ends here -->
                </div>		<!-- row ends here -->
            </div> 		<!-- col-12 ends here -->
        </div> 		<!-- tab3 card ends -->
        <div id="tab4" class="content">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="wrapper">
                        <div class="card">
                            <div class="row text-center">
                                <div class="heading">
                                    <span>Lorem Ipsum Doler</span>
                                </div>
                            </div>

                            <div class="row">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name of material</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Steel">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Material</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose weight</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Quantitiy</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Choose Something</label>
                                        <select class="form-control">
                                            <option>opt.1</option>
                                            <option>opt.2</option>
                                            <option>opt.3</option>
                                            <option>opt.4</option>
                                            <option>opt.5</option>
                                        </select>
                                    </div>


                                    <a class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button">Submit</a>
                                </form>
                            </div>		<!-- row conatining form ends here -->
                        </div>		<!-- card ends here -->
                    </div>		<!-- wrapper ends here -->
                </div>		<!-- row ends here -->
            </div> 		<!-- col-12 ends here -->
        </div> 		<!-- tab4 card ends -->
    </div>
    <!-- content container ends -->
</div>
<!-- container ends -->
<script type="text/javascript">
    // tab

    var showTab1= function(){
        // changing display
        document.getElementById('tab1').style.display="block";
        document.getElementById('tab2').style.display="none";
        document.getElementById('tab3').style.display="none";
        document.getElementById('tab4').style.display="none";
        // changing background-color of tab
        document.getElementById('tab11').style.background="#009688";
        document.getElementById('tab22').style.background="#fff";
        document.getElementById('tab33').style.background="#fff";
        document.getElementById('tab44').style.background="#fff";
        // changing color of tab
        document.getElementById('tab11').style.color="#fff";
        document.getElementById('tab22').style.color="#009688";
        document.getElementById('tab33').style.color="#009688";
        document.getElementById('tab44').style.color="#009688";
    }


    var showTab2= function(){
        document.getElementById('tab1').style.display="none";
        document.getElementById('tab2').style.display="block";
        document.getElementById('tab3').style.display="none";
        document.getElementById('tab4').style.display="none";
        // changing background-color of tab
        document.getElementById('tab22').style.background="#009688";
        document.getElementById('tab11').style.background="#fff";
        document.getElementById('tab33').style.background="#fff";
        document.getElementById('tab44').style.background="#fff";
        // changing color of tab
        document.getElementById('tab22').style.color="#fff";
        document.getElementById('tab11').style.color="#009688";
        document.getElementById('tab33').style.color="#009688";
        document.getElementById('tab44').style.color="#009688";
    }

    var showTab3= function(){
        document.getElementById('tab1').style.display="none";
        document.getElementById('tab2').style.display="none";
        document.getElementById('tab3').style.display="block";
        document.getElementById('tab4').style.display="none";
        // changing background-color of tab
        document.getElementById('tab33').style.background="#009688";
        document.getElementById('tab22').style.background="#fff";
        document.getElementById('tab11').style.background="#fff";
        document.getElementById('tab44').style.background="#fff";
        // changing color of tab
        document.getElementById('tab33').style.color="#fff";
        document.getElementById('tab22').style.color="#009688";
        document.getElementById('tab11').style.color="#009688";
        document.getElementById('tab44').style.color="#009688";
    }

    var showTab4= function(){
        document.getElementById('tab1').style.display="none";
        document.getElementById('tab2').style.display="none";
        document.getElementById('tab3').style.display="none";
        document.getElementById('tab4').style.display="block";
        // changing background-color of tab
        document.getElementById('tab44').style.background="#009688";
        document.getElementById('tab22').style.background="#fff";
        document.getElementById('tab33').style.background="#fff";
        document.getElementById('tab11').style.background="#fff";
        // changing color of tab
        document.getElementById('tab44').style.color="#fff";
        document.getElementById('tab22').style.color="#009688";
        document.getElementById('tab33').style.color="#009688";
        document.getElementById('tab11').style.color="#009688";
    }
    // tab ends


    // for optimizing js code
    /*var showTab1= function(){
     var tabName=[document.getElementById('tab1'),document.getElementById('tab2'),document.getElementById('tab3'),document.getElementById('tab4')];
     for(var i=0;i<tabName[].length;i++){
     if (tabName[i]==='tab1'||tabName[i]=='tab2',tabName[i]=='tab3',tabName[i]=='tab4'){
     document.getElementById(tabName[i]).style.display="block";
     }
     else
     for()
     {
     document.getElementById(tabName[i]).style.display="none";
     }

     }
     }
     */

</script>
</body>
</html>