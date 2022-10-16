@php
    $meta_title = "Home";
@endphp

@extends('layouts.frontend.public-app')

@push('css')

@endpush

    @section('content')

    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Welcome to our website!</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse, ullam. Magnam iure, natus error molestiae facilis neque adipisci, ut eum dolorem doloremque, dolore labore. Dignissimos quis doloribus accusantium ex cumque.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title">
                        <h3>{{ __('email-marketing.sign_up_for') }}</h3>
                        <div class="display-errors" style="display:none">
                            <span id="errors" class='alert alert-danger'></span>
                        </div>
                        <div class="display-success" style="display:none">
                            <span id="successes" class='alert alert-success'></span>
                        </div>
                    </div>

                    <div class="form-container">
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('email-marketing.your_name') }}</label>
                            <input type="text" class="form-control form-control-lg" id="name" placeholder="{{ __('email-marketing.enter_your_name') }}">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('email-marketing.your_email') }}</label>
                            <input type="email" class="form-control form-control-lg" id="email" placeholder="{{ __('email-marketing.enter_your_email') }}">
                        </div>

                        <div class="submit-btn mb-3">
                            <button id="submit-btn" onclick="subscribeManager()" class="btn col-12">{{ __('email-marketing.subscribe_btn') }}</button>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ __('email-marketing.check_privacy') }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Contact us</h3>
                    <p>If you have any questions, just contact us on one of our platforms below!</p>

                    <div class="contacts d-flex justify-content-center">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fas fa-globe fa-2x"></i></span><a href="https://tmsonic.com"> www.tmsonic.com</a></li>
                            <li><span class="fa-li"><i class="fab fa-facebook-square fa-2x"></i></span><a href="https://www.facebook.com/groups/285314396142845"> TM-Sonic Facebook Group</a></li>
                            <li><span class="fa-li"><i class="fab fa-twitter-square fa-2x"></i></span><a href="https://www.twitter.com/tmsonic_com"> TM-Sonic Twitter</a></li>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

@push('js')
    <script>

        const submitBtn = document.getElementById('submit-btn');
        const errorsDiv = document.getElementsByClassName('display-errors')[0];
        const errorsSpan = document.getElementById('errors');
        const successDiv = document.getElementsByClassName('display-success')[0];
        const successSpan = document.getElementById('successes');

        function subscribeManager()
        {
          submitBtn.disabled = true;
          errorsSpan.innerHTML = '';
          errorsDiv.style.display = 'none';
          successSpan.innerHTML = '';
          successDiv.style.display = 'none';

          let nameVal = document.getElementById('name').value;
          let emailVal = document.getElementById('email').value;

          let isValid = validateFront(nameVal, emailVal);
          if(!isValid) return;

          subscribeEmail(nameVal, emailVal);
        }

        function subscribeEmail(name, email)
        {
          fetch("{{ url('subscribe-to-list') }}", {
              method: "POST",
              headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-Token": "{{ csrf_token() }}",
              },
              body: JSON.stringify({
                  name: name,
                  email: email,
              }),
          }).then(function(res) {
              if(!res.ok)
              {
                const requestErr =  '{"error":' + "\"" + "{{__('email-marketing.unexpected_error_request')}}" + "\"" + '}';
                return JSON.parse(requestErr);
              }
              else
              {
                return res.json();
              }
          }).then(function(data){
                if(data.hasOwnProperty('success'))
                {
                    showSuccess(data['success']);
                }
                else if((data.hasOwnProperty('error')))
                {
                    showError(data['error']);
                }
                else
                {
                    showError("{{__('email-marketing.unexpected_error')}}");
                }
          });
        }

        function showError(errMsg)
        {
          successSpan.innerHTML = '';
          successDiv.style.display = 'none';
          errorsSpan.innerHTML = errMsg;
          errorsDiv.style.display = '';
          submitBtn.disabled = false;
        }

        function showSuccess(successMsg)
        {
            errorsSpan.innerHTML = '';
            errorsDiv.style.display = 'none';
            successSpan.innerHTML = successMsg;
            successDiv.style.display = '';
            submitBtn.disabled = false;
        }

        function validateFront(nameVal, emailVal)
        {
          if(nameVal == '')
          {
            showError("{{ __('email-marketing.provide_name') }}");
            return false;
          }

          const regex = /[a-zA-z]+/;
          if(!regex.test(nameVal))
          {
            showError("{{ __('email-marketing.provide_valid_name') }}");
            return false;
          }

          if(emailVal == '')
          {
            showError("{{ __('email-marketing.provide_email') }}");
            return false;
          }

          const regexEmail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(!regexEmail.test(emailVal))
          {
            showError("{{ __('email-marketing.provide_valid_email') }}");
              return false;
          }

          const privacyCheck = document.getElementById('flexCheckDefault');
          if(!privacyCheck.checked)
          {
            showError("{{ __('email-marketing.accept_privacy') }}");
            return false;
          }

          return true;
        }
    </script>
@endpush
