@extends('layouts.master')
    
@section('links_data')
    <!-- Google's jquery cdn to be placed here -->

    <!-- Jquery code to do master magic here -->
    <script type="application/javascript">
        $(document).ready(function () {
            $('#category').click(function () {
                var res;
                var category= $('#category').val();
                console.log(category);

                $.ajax({
                    url:'search/category/'+category,
                    data: category,
                    method: 'POST',
                    dataType: "json",
                    success: function(response)
                    {
                        for(i=1;i<6;i++)
                        {
                            console.log(response[i]);
                            if(response[i]== null)
                                break;
                            $('#options').append("<option value="+response[i]+">" + response[i] + "<option>");

                        }
                    }
                }); // ajax call function ends

            });     // category function ends

            $('#options').click(function () {
               //alert($('#options').val());
                $('#search_form').append("<input type='text' name='"+$('#options').val()+"' value='' placeholder='Enter "+$('#options').val()+"' >");
            });
        });         // document ready function ends



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
                        {{ Form::open(array('id'=>'search_form','action'=>'searchController@store')) }}


                  <!-- Category to be searched, category means these processes, like raw material, cutting etc -->
                        {{ Form::label('exampleInputEmail1','Category') }}
                        <select class="form-control multiple search selection" name="category" id="category">
                                <option value="">---- Select Category From here ----</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category }}">{{$category->category}}</option>
                            @endforeach
                        </select>

                  <!-- Options to be selected, to be loaded using ajax form search_selection table -->
                        {{ Form::label('exampleInputEmail1','Options') }}
                        <select class="form-control" name="options" id="options" >
                        </select>


                         <button class="waves-effect waves-light btn col-xs-12 col-sm-12 col-md-12 col-lg-12 teal button" type="submit">Submit</button>


                        {{ Form::close() }}

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->

<script type="text/javascript">
    $(function(){

        $("#category").dropdown();
    });

</script>


@stop