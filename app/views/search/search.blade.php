@extends('layouts.master')

@section('links_data')
    <!-- Google's jquery cdn to be placed here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
                        console.log(response);
                        $('#options').val(response);
                    }
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
                        {{ Form::open(array('id'=>'search_form')) }}


                  <!-- Category to be searched, category means these processes, like raw material, cutting etc -->
                        {{ Form::label('exampleInputEmail1','Category') }}
                        <select class="form-control" name="category" id="category">
                                <option value="">---- Select Category From here ----</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category }}">{{$category->category}}</option>
                            @endforeach
                        </select>

                  <!-- Options to be selected, to be loaded using ajax form search_selection table -->
                        {{ Form::label('exampleInputEmail1','Options') }}
                        <select class="form-control" name="options" id="options" >
                            <option><!-- Values to be loaded using ajax --></option>
                        </select>




                        {{ Form::close() }}

                    </div>		<!-- row conatining form ends here -->
                </div>		<!-- card ends here -->
            </div>		<!-- wrapper ends here -->
        </div>		<!-- row ends here -->
    </div> 		<!-- col-12 ends here -->




@stop