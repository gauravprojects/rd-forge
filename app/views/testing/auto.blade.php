<!doctype html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function(){
                $('#name').keyup(function(){

                    var cus_name= {
                        name: $(this).val()
                    }

                    $.ajax({
                        url: 'auto',
                        type:"POST",
                        data:$(this).val(),
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
        <form>
            <input type="text" id="name" placeholder="Enter Customer name" />
            <div id="box"></div>
        </form>
    </body>
</html>