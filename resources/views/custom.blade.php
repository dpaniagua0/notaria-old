<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notaria</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/css/plugins/iCheck/custom.css">
    <link rel="stylesheet" href="/css/plugins/chosen/chosen.css">
    <link rel="stylesheet" href="/css/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/css/plugins/cropper/cropper.min.css">
    <link rel="stylesheet" href="/css/plugins/switchery/switchery.css">
    <link rel="stylesheet" href="/css/plugins/jasny/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="/css/plugins/nouslider/jquery.nouislider.css">
    <link rel="stylesheet" href="/css/plugins/datapicker/datepicker3.css">
    <link rel="stylesheet" href="/css/plugins/ionRangeSlider/ion.rangeSlider.css">
    <link rel="stylesheet" href="/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/style.css">

    @yield('app-css')

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    @include('sidebar')
    <div id="page-wrapper" class="gray-bg">

        @include('border-bottom')

        @yield('content')

        @include('footer')
    </div>
</div>
<script src="/js/jquery-2.1.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/js/plugins/jsKnob/jquery.knob.js"></script>
<script src="/js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="/js/plugins/nouslider/jquery.nouislider.min.js"></script>
<script src="/js/plugins/switchery/switchery.js"></script>
<script src="/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="/js/plugins/iCheck/icheck.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="/js/plugins/cropper/cropper.min.js"></script>
<script src="/js/plugins/validate/jquery.validate.min.js"></script>
<script src="/js/plugins/validate/localization/messages_es.js"></script>

<script src="/js/app.js"></script>

@yield('app-js')


</body>
</html>
