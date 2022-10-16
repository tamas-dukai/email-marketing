</div> <!-- End .wrapper -->
    <footer>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="footer-widgets">
                            Footer w1
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="footer-widgets">
                            Footer w2
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="footer-widgets">
                            Footer w3
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="footer-widgets">
                            Footer w4
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright © {{ env('APP_NAME') }} {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>

<!-- SCIPTS -->

<script src="{{ asset('public/assets/backend/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/custom.js') }}"></script>
@stack('js')

</body>
</html>

