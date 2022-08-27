<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <style>
        html, body {
            padding: 0;
            margin: 0;
        }

        table {
            text-align: center;
            width: 100%;
            border-spacing: 3mm 0mm;
            table-layout: fixed;
            padding: 10mm 2mm;
        }

        td {
            border: 1px solid black;
            border-radius: 5px;
            height: 24mm;
            width: 64mm;
        }
    </style>

    <title>pdf Export</title>
</head>
<body>
<table>
    @foreach($contacts as $contact)
        <tr>
            <td>
                First Name
                <br>
                {{$contact->first_name}}
            </td>
            <td>
                Last Name
                <br>
                {{$contact->last_name}}
            </td>
            <td>
                Phone Number
                <br>
                {{$contact->tel}}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
