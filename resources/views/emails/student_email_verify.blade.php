@component('mail::message')
<p style="margin-bottom: 15px">
    {{ __('sentences.verify_email') }}:
</p>
<p>
    <a class="btn btn-primary" href="{{ route('app.handle_email_verify_token', ['token' => $email_verify_token]) }}">{{ __('sentences.click_here_to_verify') }}</a>
</p>
@endcomponent
