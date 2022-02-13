{{-- Master Layout Tanımlama --}}
{{-- Header include --}}
@include('front.layouts.header')
{{-- icerik include --}}
@yield('content') 
{{-- Footer include --}}
@include('front.layouts.footer')