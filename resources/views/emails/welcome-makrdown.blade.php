@component('mail::message')
# Introduction

The body of your message.

Default list of items:
- item 1
- item 2
- item 3

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
