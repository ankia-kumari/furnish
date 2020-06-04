@component('mail::message')
    # Hello {{$user_name}},

    Thank You, For Registering With Us

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
