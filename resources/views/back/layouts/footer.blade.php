

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="{{asset('back/')}}/#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('back/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('back/')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('back/')}}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('back/')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('back/')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('back/')}}/js/demo/datatables-demo.js"></script>

    {{-- Toastr --}}
    @toastr_js
    @toastr_render
</body>

</html>