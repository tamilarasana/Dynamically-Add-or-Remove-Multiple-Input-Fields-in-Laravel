<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Validate form</title>
    <!-- library bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- library js validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

</head>
<body>
    <style>
        .error {
            color: red;
            border-color: red;
        }
    </style>
    <div class="container">
        <br><br>
        <h3>Form Basic</h3>
        <span id="message_error"></span>
        <hr><br>
        <form id="validate" action="{{ route('form/save') }}" method="post">
            @csrf   
            <table id="emptbl" class="table table-bordered border-primar">
                <thead class="table-dark">
                    <tr>
                        <th>Employee Name</th>
                        <th>Phone</th>
                        <th>Department</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td id="col0"><input type="text" class="form-control" name="empname[]" placeholder="Enter your name" required></td> 
                        <td id="col1"><input type="tel" class="form-control" name="phone[]" placeholder="Enter your phone" required></td> 
                        <td id="col2"> 
                            <select class="form-control" name="department[]" id="dept" required> 
                                <option selected disabled>-- Select --</option> 
                                <option value="Accounting">Accounting</option>
                                <option value="Marketing">Marketing</option>
                                <option value="IT Management">IT Management</option>
                            </select> 
                        </td>
                    </tr>
                </tbody>  
            </table> 
            <table>
                <br>
                <tr> 
                    <td><button type="button" class="btn btn-sm btn-info" onclick="addRows()">Add</button></td>
                    <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRows()">Remore</button></td>
                    <td><button type="submit" class="btn btn-sm btn-success">Save</button></td> 
                </tr>  
            </table>
        </form>
        <br>
        <table class="table table-sm table-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Department</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$items )
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $items->empname }}</td>
                    <td>{{ $items->phone }}</td>
                    <td>{{ $items->department }}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <script>
        function addRows()
        { 
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length; 
            var row = table.insertRow(rowCount);
            for(var i =0; i <= cellCount; i++)
            {
                var cell = 'cell'+i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col'+i).innerHTML;
                cell.innerHTML=copycel;
                if(i == 2)
                { 
                    var radioinput = document.getElementById('col2').getElementsByTagName('input'); 
                    for(var j = 0; j <= radioinput.length; j++)
                    { 
                        if(radioinput[j].type == 'radio')
                        { 
                            var rownum = rowCount;
                            radioinput[j].name = 'gender['+rownum+']';
                        }
                    }
                }
            }
        }

        function deleteRows()
        {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if(rowCount > '2')
            {
                var row = table.deleteRow(rowCount-1);
                rowCount--;
            }else{
                alert('There should be atleast one row');
            }
        }
    </script>
    <!-- alert blink text -->
    <script>
        function blink_text()
        {
            $('#message_error').fadeOut(700);
            $('#message_error').fadeIn(700);
        }
        setInterval(blink_text,1000);
    </script>
    <!-- script validate form -->
    <script>
        $('#validate').validate({
            reles: {
                'empname[]': {
                    required: true,
                },
                'phone[]': {
                    required:true,
                },
                'department[]': {
                    required:true,
                },
            },
            messages: {
                'empname[]' : "Please input file*",
                'phone[]' : "Please input file*",
                'department[]' : "Please input file*",
            },
        });
    </script>

</body>
</html>

