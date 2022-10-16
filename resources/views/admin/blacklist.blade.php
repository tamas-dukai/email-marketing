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
            <h1 class="m-0">{{ __("admin.blacklist_settings") }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __("admin.home") }}</a></li>
              <li class="breadcrumb-item active">{{ __("admin.blacklist_settings") }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
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
              </div>

            </div> <!-- /-row -->
        </div> <!-- /-container-fluid -->
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">{{ __("admin.blacklist_settings") }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.blacklist.update')}}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card-body">

                    <input type="hidden" name="id" value="">
                    <div class="row">
                        <div class="col-lg">
                            <h6 style="font-weight: 600; text-transform: uppercase;">{{ __('admin.bl_proh_emails') }}</h6>
                            <p>{{ __('admin.bl_proh_emails_desc') }}</p>
                        </div><!-- col -->
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <textarea rows="10" class="form-control" name="blacklisted_domains" placeholder="{{ __('admin.bl_proh_emails_ph') }}">{{old('blacklisted_domains', $domainBlacklist)}}</textarea>
                        </div><!-- col -->
                    </div><!-- row -->

                    <hr style="background: #ccc;">

                    <div class="row mt-4">
                        <div class="col-lg">
                            <h6 style="font-weight: 600; text-transform: uppercase;">{{ __('admin.bl_proh_address') }}</h6>
                            <p>{{ __('admin.bl_proh_address_desc') }}</p>
                        </div><!-- col -->
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <textarea rows="10" class="form-control" name="blacklisted_emails" placeholder="{{ __('admin.bl_proh_address_ph') }}">{{old('blacklisted_emails', $emailBlacklist)}}</textarea>
                        </div><!-- col -->
                    </div><!-- row -->






                </div> <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">{{ __("admin.save_settings") }}</button>
                </div> <!-- /.card-footer -->
            </form>

        </div> <!-- /. card card-info -->


      </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  @endsection

@push('js')

@endpush
