<html>
    <head>
    <style> th,tr,td{border: 1px solid black; }</style>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/2.10.6/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
     <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/> -->


    </head>
    <body>

        <div>
            <div class='col-sm-6'>
                    <div class="form-group" style="position:relative">
                        <div class='input-group date' id='datetimepicker1'>
                            
                            <input id="myInput" type="text" name="myInputSearches" class="form-control"  >

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
            </div><br><br><br>
            <div class='col-sm-6'>
                    <div class="form-group" style="position:relative">
                        <div class='input-group date' id='datetimepicker1'>
                            
                           <input type="search" id="mySearch" name="q" />
                           <button>Search</button>
                        </div>
                    </div>
            </div><br><br><br>
            <label class="noResults" align="right" style="display:none; color:red"><b><i>No Match Found</i></b></label>
        </div>

            <table style="border: 1px solid black;" id="searchdata">
                <thead style="border: 1px solid black;">
                    <th>name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>action</th>
                </thead>
                <tbody>
                    @foreach($data as $post)
                    <tr>
                        <td>{{$post->name}}</td>
                        <td>{{$post->email}}</td>
                        <td>{{$post->password}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td><a href="{{ route('update', $post->id) }}" class="label label-success">Details</a>
                            <a href="{{ route('edit', $post->id) }}" class="label label-warning">Edit</a>
                            <a href="{{ route('destroy', $post->id) }}" class="label label-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </body>

    <script type="text/javascript">
        $(document).ready(function () {   
            
             $("button").click(function(){  
                    jQuery.ajax({  
                    url: 'searchdata?search='+$('#mySearch').val(),  
                    type: 'GET',
                    dataType: 'json',  
                      success: function(res) {
                        var str ='';

                        $.each(res.data, function(index, value) {
                            str += '<tr><td>'+value.name+'</td>';
                            str += '<td>'+value.email+'</td>';
                            str += '<td>'+value.password+'</td>';
                            str += '<td>'+value.created_at+'</td>';
                            str +=  '<td>'+value.updated_at+'</td>';
                            str += '</tr>';
                            
                        });
                        $("#searchdata tbody").html(str);  

                      }  
                    });  
            }); 



            $('#myInput').datetimepicker({
                format: 'DD-MM-YYYY',
            });

            $('#myInput').on('dp.change', function (e) {
             var rex = new RegExp($(this).val(), "i");
            $("#myTable tr").hide();
            $("#myTable tr").filter(function () {
                return rex.test($(this).text());
            }).show();
            $(".noResults").hide();
            if ($("#myTable tr:visible").length == 0) {
                $(".noResults").show();
            }
            });  
        });
    </script>
</html>