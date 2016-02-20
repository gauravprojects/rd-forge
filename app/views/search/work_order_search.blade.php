
<!-- Google's jquery cdn to be placed here -->

   <script type="text/javascript" src="js/search.js"></script>


                <div class="row text-center">
                    <div class="heading">
                        <span>Work Order Search Panel</span>
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
                        <option value="work_order_no">Work order Number</option>
                        <option value="customer_name">Customer Name</option>
                        <option value="start_date">Start Date</option> 
                        <option value="end_date">End Date</option> 
                    </select>

                    <br>

                     <div id="search_form_div"></div>
                     <div id="report_display"></div>

                    {{ Form::close() }}

                </div>

<script type="text/javascript">
    $(function(){
        $("#options").dropdown();
        $("#patterson").dropdown();
    });

</script>
