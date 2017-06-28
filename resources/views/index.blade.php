<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} &mdash; Laravel Excel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url('dist/css/bootstrap.min.css') }}">
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
                /*font-weight: 100;*/
                /*height: 100vh;*/
                margin: 10px 0 20px;
            }

            /*.full-height {
                height: 100vh;
            }*/

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            /*.position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }*/

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                /*color: #636b6f;*/
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }      

            .links form, label {
                border: none;
                /*color: #636b6f;*/
                padding: 5px 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container content">

            <div class="content">
                <div class="title m-b-md">
                    Laravel Excel
                </div>

                <div class="links">
                    <a href="{{ url('export-file/xls') }}">Export File .xls</a>
                    <a href="{{ url('export-file/xlsx') }}">Export File .xlsx</a>
                    <hr>   
                    <form action="{{ url('import-file') }}" method="post" enctype="multipart/form-data" class="form-inline">
                        {{ csrf_field() }}
                        <label >Import File : </label>
                        <input class="form-control" type="file" name="file">
                        <input class="btn btn-default" type="submit" value="Import File">
                    </form>
                </div>
            </div>
            <hr>
            @include('form')
        </div>
    </body>
    <!-- Scripts -->
    <script src="{{ url('dist/js/jquery.min.js') }}"></script>
    <script src="{{ url('dist/js/bootstrap.min.js') }}"></script>
    @yield('script')
</html>
