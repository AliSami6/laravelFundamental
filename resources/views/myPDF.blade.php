<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eduman PDF</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        header{
            text-align: center;
        }
        /* Style the header */
        table {
            padding:40px;
            text-align: center;
            font-size:14px;
            color:#000;
        }
        .table{
           border: 1px solid #0e0e0e;
        }
        /* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
        @media (max-width: 600px) {

            nav,
            article {
                width: 100%;
                height: auto;
            }
        }
    </style>
</head>

<body>



    <header>
        <h2 class="rtb">ROUTINE</h2>
    </header>
    <main>
            <caption>
            </caption>
            <table width="60%" height="374"  cellspacing="5" class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Subjects</th>
                        <th>Reg</th>
                        <th>Address</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="center p-3 m-1">{{ $user->id }}</td>
                            <td class="center p-3 m-1">{{ $user->name }}</td>
                            <td class="center p-3 m-1">{{ $user->roll }}</td>
                            <td class="center p-3 m-1">{{ $user->subject }}</td>
                            <td class="center p-3 m-1">{{ $user->reg }}</td>
                            <td class="center p-3 m-1">{{ $user->address }}</td>
                            <td class="center p-3 m-1">{{ $user->mobile }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <td>₹180</td>
                        <td>₹255</td>
                        <td>₹210</td>
                        <td>₹340</td>
                        <td>₹160</td>
                    </tr>
                </tfoot>
            </table>
    </main>

</body>

</html>
