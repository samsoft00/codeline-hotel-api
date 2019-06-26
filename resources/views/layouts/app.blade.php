<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Codeline Backend Office</title>

        <link rel="stylesheet" href="/backend/vendors/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/backend/vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/backend/vendors/themify-icons/css/themify-icons.css">
        <link rel="stylesheet" href="/backend/vendors/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="/backend/vendors/selectFX/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="/backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    
        <link rel="stylesheet" href="assets/css/style.css">        

        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    </head>
    <body class="bg-dark">

            <div class="sufee-login d-flex align-content-center flex-wrap">
                @yield('content')
            </div>

            
            <script src="/backend/vendors/jquery/dist/jquery.min.js"></script>
            <script src="/backend/vendors/popper.js/dist/umd/popper.min.js"></script>
            <script src="/backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="/backend/assets/js/main.js"></script>
        
        
            <script src="/backend/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="/backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
            <script src="/backend/vendors/jszip/dist/jszip.min.js"></script>
            <script src="/backend/vendors/pdfmake/build/pdfmake.min.js"></script>
            <script src="/backend/vendors/pdfmake/build/vfs_fonts.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="/backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
            <script src="/backend/assets/js/init-scripts/data-table/datatables-init.js"></script>            

        </div>
    </body>
</html>