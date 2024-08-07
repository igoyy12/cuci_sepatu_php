@vite(["resources/js/app.js"])

<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/vendors/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/vendors/jquery-timepicker/jquery.timepicker.js') }}"></script>
<script src="{{ asset('/vendors/apexcharts/apexcharts.min.js') }}"></script>


<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

@livewireScripts
<script src="{{ asset('/js/main.js') }}"></script>

{{ $script ?? ''}}