<!DOCTYPE html>
<html>

<head>

    <style>

        body{
            padding:0;
            margin:0;
            box-sizing:border-box;
             font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgb(14, 13, 13);
            font-size: 16px;
            line-height: 24px;
            color: #000;
         padding-left:30px;
         padding-right:30px;
            background: #fff;
         padding-bottom:2rem;

        }
img{
    max-width: 80%!important;
    margin: auto;
}
    </style>
</head>

<body>
    <div class="invoice-box">

     

            @yield('content')
    </div>
</body>

</html>
