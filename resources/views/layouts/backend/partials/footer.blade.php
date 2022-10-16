<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="https://tmsonic.com">TM-Sonic</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0-rc
    </div>
  </footer>


</div> <!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/assets/backend/vendors/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('public/assets/backend/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/assets/backend/vendors/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('public/assets/backend/js/adminlte.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
@stack('js')
</body>
</html>
