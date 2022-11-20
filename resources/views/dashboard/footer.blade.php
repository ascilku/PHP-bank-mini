
        @include('dashboard.meta-link.meta-link-footer') 

        <script>
            function myFunction() {
                    var x = document.getElementById("provinsi_domisili");           
                    if (x.type === "password") {
                            x.type = "text";
                    } else {
                            x.type = "password";
                    }
                }

        </script>

        <script src="{{ asset('') }}dist/js/tabler.min.js"></script>
        <script src="{{ asset('') }}js-consume/my-js.js"></script>
        <script src="{{ asset('') }}js-consume/js-select.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

  
</body>
</html>
