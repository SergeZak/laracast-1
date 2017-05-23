@component('mail::message')
# Introduction

Thank you for registering

@component('mail::button', ['url' => '#'])
Visit Our Site
@endcomponent

@component('mail::panel', ['url' => ''])
    Love your family!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
