
<!-- Google's jquery cdn to be placed here -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#options').change(function () {
                options= $('#options').val();
                var html = "";
                if(options == null)
                    html = "";
                else
                {
                    for(var i=0;i<options.length;i++)
                        if(options[i] != "date_range")
                             html = html + '<input type="text" class="form-control inputfix" placeholder="Enter '+options[i]+' here " class="'+options[i]+'">';
                         else
                             html = html + '<input type="text" class="form-control inputfix" placeholder="Enter start date"><input type="text" class="form-control inputfix" placeholder="Enter end date">';
                }
                $('#search_form_div').html(html);
            });

            $("#search_query").on("click",function(){

                var options= $('#options').val();
                var array_mine = new Array();

               $.each($('#search_form input'),function(key,getting)
               {
                array_mine.push(getting.value)
               });


                $.ajax({
                    'type': 'GET',
                    'url' : 'search/display',
                    'data' : {options_name:options,options_values:array_mine}
                })
                .done(function(data)
                {
                    console.log(data);
                });

            });
        });
    </script>


                <div class="row text-center">
                    <div class="heading">
                        <span>Machining Search Panel</span>
                    </div>
                </div>

                <div class="row">

                    <!-- Form open, contains three fields, category, options and particular search field -->
                    {{ Form::open(array('action'=>'searchController@store')) }}


                        <!-- Category to be searched, category means these processes, like raw material, cutting etc -->


                    <!-- Options to be selected, to be loaded using ajax form search_selection table -->
                    {{ Form::label('exampleInputEmail1','Select from following options') }}
                    <select class="form-control ui fluid search dropdown" name="options[]" id="options" multiple="">
                        <option value="">Select from following options</option>
                        <option value="heat_no">Heat Number</option>
                        <option value="manufacturer">Manufacturer</option>
                        <option value="size">Size</option>
                        <option value="available_weight">Left Over material</option>
                        <option value="date_range">Date Range</option>
                    </select>

                    <br>

                     <div id="search_form_div"></div>

                    {{ Form::close() }}

                </div>

<script type="text/javascript">
    $(function(){
        $("#options").dropdown();
        $("#patterson").dropdown();
    });

</script>
