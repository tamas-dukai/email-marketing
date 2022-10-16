@extends('layouts.backend.admin-app')


@push('css')

@endpush

@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __("admin.ck_settings") }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __("admin.home") }}</a></li>
              <li class="breadcrumb-item active">{{ __("admin.ck_settings") }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Update messages -->
        <div class="row">
            <div class="col-lg-12">
                @if(session('successMsg'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('successMsg') }}</strong>
                    </div>
                @endif

                @if(session('failureMsg'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{!! session('failureMsg') !!}</strong>
                    </div>
                @endif
            </div>
        </div>  <!-- /. Update messages -->

        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">{{ __("admin.ck_settings") }}</h3>
            </div>
            <!-- /.card-header -->

            <div class="p-4">
              <h3 class="text-center">The ConvertKit integration is available in our premium course on Udemy!</h3>
              <p class="text-center">If you are interested, click the button below to check out the course! If you would like to purchase the course, contact us and we will send you a coupon with the lowest price. We appreciate your support. This helps us keep the lights on :)</p>
              <p class="text-center"><a href="#" class="btn btn-info">Go to course!</a></p>
            </div>
          </div>


      </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  @endsection

@push('js')

@endpush
