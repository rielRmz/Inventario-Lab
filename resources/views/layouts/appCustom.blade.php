<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 280px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background-color: #009879;
            color: #FFFFFF;
            text-align: left;
            font-weight: bold;
            width: 250px;
        }

        .content-table th, td {
            padding: 12px 15px
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody td {
            text-align: center;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>

    <title>Document</title>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>

