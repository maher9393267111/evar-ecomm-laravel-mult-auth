<script src="{{asset('backend/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
    <script src="{{asset('backend/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/select2.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/jquery.fullscreen.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/vendors/chart.js')}}"></script>
    <!-- Main Script -->
    <script src="{{asset('backend/assets/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/js/custom-chart.js')}}" type="text/javascript"></script>

    @yield('scripts')
   <script>
       setTimeout(function(){
           $('#alert').slideUp();

       },4000);
   </script>
   <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>