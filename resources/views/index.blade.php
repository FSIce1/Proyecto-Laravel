<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <title>Document</title>
</head>
<body>

    <div class="container">

        <table id="prueba" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>EMAIL</td>
                </tr>
            </thead>

        </table>  
        
        
    </div>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#prueba').DataTable({
                'serverSide': true,
                "ajax": "{{ url('api/users') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                ]
            });
        });
    </script>
</body>
</html>