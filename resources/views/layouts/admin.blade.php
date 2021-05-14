<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Abet</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @component('components.sidebar')

        @endcomponent
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->

            <!-- Content Column -->
        @component('components.wrapper')

        @endcomponent


        <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script type="text/javascript">
        function myFunction() {
            var input, filter, div, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDiv");
            report = div.getElementsByClassName("report");
            console.log(report[0].getElementsByClassName("report-div"))
            for (i = 0; i < report.length; i++) {
                a = report[i].getElementsByClassName("report-diva")[0];
                txtaValue = a.textContent || a.innerText;
                b = report[i].getElementsByClassName("report-divb")[0];
                txtbValue = b.textContent || b.innerText;
                c = report[i].getElementsByClassName("report-divc")[0];
                txtcValue = c.textContent || c.innerText;
                d = report[i].getElementsByClassName("report-divd")[0];
                txtdValue = d.textContent || d.innerText;
                if (txtaValue.toUpperCase().indexOf(filter) > -1 ||
                    txtbValue.toUpperCase().indexOf(filter) > -1 ||
                    txtcValue.toUpperCase().indexOf(filter) > -1 ||
                    txtdValue.toUpperCase().indexOf(filter) > -1
                    ) {
                    report[i].style.display = "";
                } else {
                    report[i].style.display = "none";
                }
            }
        }
        </script>
</body>
</html>
