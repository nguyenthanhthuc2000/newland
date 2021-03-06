
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ getUrlImageUpload($settings ? $settings->logo : '', 'setting') }}" type="image/gif" sizes="16x16">
    @routes()

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <script>
        let map;

        function initMap() {
        map = new google.maps.Map(document.querySelector(".map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 8,
        });
        }
    </script>
    <style>

    </style>

</head>
