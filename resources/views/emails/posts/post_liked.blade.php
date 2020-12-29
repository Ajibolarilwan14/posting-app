@component('mail::message')
# Hy, your post was liked.

Hello, {{ $liker->name }} liked one of your post.

@component('mail::button', ['url' => route('post.show', $post)])
view the post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
