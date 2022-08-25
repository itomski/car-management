@component('mail::message')
# Introduction

{{ $msg }}

@component('mail::button', ['url' => $url, 'color' => 'green'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
