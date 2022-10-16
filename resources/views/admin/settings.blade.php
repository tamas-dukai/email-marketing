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
            <h1 class="m-0">{{ __("admin.email_marketing_settings") }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ __("admin.home") }}</a></li>
              <li class="breadcrumb-item active">{{ __("admin.email_marketing_settings") }}</li>
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
              <h3 class="card-title">{{ __("admin.email_marketing_settings") }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('admin.settings.update')}}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
              <div class="card-body">

                <div class="row">
                    <div class="col-sm-5">
                        <h6 style="font-weight: 600; text-transform: uppercase;">{{ __("admin.select_service_provider") }}</h6>
                        <p style="font-size: 14px;">{{ __("admin.select_service_provider_info") }}</p>
                    </div>

                    <div class="col-sm-7">
                        <select class="form-control" name="provider" autocomplete="off">
                            @foreach($providers as $provider)
                                <option value="{{$provider->provider}}" @if( old('provider', $currentProvider) == $provider->provider ) selected @endif>{{$provider->provider}}</option>
                            @endforeach
                        </select>
                        <p style="color:red;">{{ $errors->first('provider') }}</p>
                        </select>
                    </div>
                </div>

                <hr style="background: #ccc;">

                <div class="row">
                    <div class="col-sm-5">
                        <h6 style="font-weight: 600; text-transform: uppercase;">{{ __("admin.add_users_to_list") }}</h6>
                        <p style="font-size: 14px;">{{ __("admin.add_users_to_list_info") }}</p>
                    </div>

                    <div class="col-sm-7">
                      <select class="form-control" name="subscribe_option" autocomplete="off">
                        @foreach($options as $option)
                            <option value="{{$option->option}}" @if( old('subscribe_option', $currentOption) == $option->option ) selected @endif>{{$option->option}}</option>
                        @endforeach
                        <p style="color:red;">{{ $errors->first('subscribe_option') }}</p>
                    </select>
                    </div>
                </div>

                <hr style="background: #ccc;">

                <div class="row">
                    <div class="col-sm-5">
                        <h6 style="font-weight: 600; text-transform: uppercase;">{{ __("admin.auto_check") }}</h6>
                        <p style="font-size: 14px;">{{ __("admin.auto_check_info") }}</p>
                    </div>

                    <div class="col-sm-7">
                        <select class="form-control" name="tick_subscribe" autocomplete="off">
                            <option value="0" {{ (old("tick_subscribe", $currentTick) == "0" ? "selected":"") }}>
                                {{ __("admin.no") }}
                            </option>

                            <option value="1" {{ (old("tick_subscribe", $currentTick) == "1" ? "selected":"") }}>
                                {{ __("admin.yes") }}
                            </option>
                        </select>
                        <p style="color:red;">{{ $errors->first('tick_subscribe') }}</p>
                    </div>
                </div>

                <hr style="background: #ccc;">





              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info">{{ __("admin.save_settings") }}</button>
              </div>
              <!-- /.card-footer -->
            </form>
          </div>


      </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->

  @endsection

@push('js')

@endpush
