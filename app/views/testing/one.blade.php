<!doctype html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


        <script type="text/javascript">
                $(document).ready(function(){
                  $('#won').blur(function(){

                      $.ajax({
                          url: 'testing',
                          type:"POST",
                          data: $(this).val() ,
                          contentType: "application/json"
                      }).done(function(data)
                      {
                          alert(data);
                      });
                  });
                });

        </script>

    </head>
    <body>
        <p>This form should filup automatically on enetring the work order no</p>

        <div id="form">
            {{ Form::open() }}

            {{ Form::text('work_order_no',null,array('id'=>'won')) }}
            <br>


           // now item numbers of a particular work order no should load up here
            <br>
            <select name="item" id="item">
                <option value="si">Item no</option>
            </select>
            <br>
            {{ Form::submit('submitt form') }}

            <br>
            {{ Form::close() }}

        </div>
    </body>

</html>