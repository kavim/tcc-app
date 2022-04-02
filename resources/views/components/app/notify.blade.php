@if (! auth()->user()->student->isAcademicInstitutionEmailVerified())
    <div class="card border-danger mb-3">
      <div class="card-header text-white bg-danger"><strong>{{ __('messages.warning') }}</strong> </div>
      <div class="card-body">
        <h5 class="card-title">{{ __('messages.academic_email_not_verified') }}</h5>
        <p class="card-text">{{ __('messages.we_will_send_you_a_link_to_verify_your_email') }}</p>
          <form method="post" action="{{ route('app.verify_academic_email') }}">
              @csrf
              <label for="email">{{ __('E-Mail Address') }}</label>
              <input id="email" type="email" placeholder="email{{ config('custom.academic_email_suffix_utec') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
              <button class="btn btn-primary mt-3" type="submit">{{ __('sentences.submit') }}</button>
          </form>

          <div>
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    {{ __('sentences.i_do_not_have_a_academic_email') }}
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                            <div class="modal-body">
                                {{ __('sentences.to_validate_yout_profile_get_in_touch_with_yout_academic_institution') }}
                            </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ok</button>
                        </div>
                    </div>
                    </div>
                </div>
          </div>
      </div>
    </div>
@endif
