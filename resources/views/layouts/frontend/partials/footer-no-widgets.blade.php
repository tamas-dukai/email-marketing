</div> <!-- End .wrapper -->
<footer>

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
