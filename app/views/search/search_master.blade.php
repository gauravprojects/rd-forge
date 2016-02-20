@extends('layouts.master')

@section('links_data')

        <style type="text/css">

        .ui.label {
    color:black;
    display: inline-block;
    line-height: 1;
    vertical-align: baseline;
    margin: 0em 0.14285714em;
    background-color: #e8e8e8;
    background-image: none;
    padding: 0.5833em 0.833em;
    /* color: rgba(0, 0, 0, 0.6); */
    text-transform: none;
    font-weight: bold;
    border: 0px solid transparent;
    border-radius: 0.28571429rem;
    -webkit-transition: background 0.1s ease;
    transition: background 0.1s ease;
}

.ui.label > .delete.icon {
    cursor: pointer;
    margin-right: 0em;
    margin-left: 0.5em;
    font-size: 0.92857143em;
    opacity: 0.5;
    -webkit-transition: background 0.1s ease;
    transition: background 0.1s ease;
}

i.icon.delete:before {
    content: "\f00d";
}

        </style>

        <!-- Google's jquery cdn to be placed here -->

    <script type="text/javascript">
        $(document).ready(function () {
            $("#categories").on("change",function(){

                $.ajax({

                    'type' : 'GET',
                    'url' : $(this).val(),
                    'data' : ''

                })
                .done(function(data){

                    $("#search_form").html(data);

                });

            });
        });
    </script>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="wrapper">
            <div class="card">
                <div class="row text-center">
                    <div class="heading">
                        <span>Search Panel</span>
                    </div>
                </div>

                <div class="row">

                    <!-- Form open, contains three fields, category, options and particular search field -->


                        <!-- Category to be searched, category means these processes, like raw material, cutting etc -->


                    <!-- Options to be selected, to be loaded using ajax form search_selection table -->
                    {{ Form::label('exampleInputEmail1','Select from following options') }}
                    <select class="form-control ui search selection" name="categories[]" id="categories">
                       <option value="">Select from following options</option>
                       <option value="work_order_search">Work Order</option>
                        <option value="raw_material_search">Raw Material</option>
                        <option value="cutting_search">Cutting</option>
                        <option value="forging_search">Forging</option>
                        <option value="machining_search">Machining</option>
                        <option value="drilling_search">Drilling</option>
                        <option value="serration_search">Serration</option>
                    </select>

                    <br/>

                    <div id="search_form"></div>

                    <a id="search_query" class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" >Submit</a>

                
                    </div>
                </div>      <!-- row conatining form ends here -->
            </div>      <!-- card ends here -->
        </div>      <!-- wrapper ends here -->
    </div>      <!-- row ends here -->
</div>      <!-- col-12 ends here -->



<script type="text/javascript">
    $(function(){
        $("#categories").dropdown();
    });

</script>


@stop