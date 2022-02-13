{{-- Master Layout Tanımlama --}}
{{-- Header include --}}
@include('back.layouts.header')
    <!-- Page Wrapper -->
<div id="wrapper">
    @include('back.layouts.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('back.layouts.navbar')
            @yield('content') {{-- İçerik Ekleme Alanı --}}
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
@include('back.layouts.footer')