@component('mail::message')
# Introduction

Hello {{ $survey->name }}

you just now reply to survey title - {{ $survey->questionnaire->title }}

@component('mail::button', ['url' => $survey->questionnaire->publicPath() ])
Survey
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
