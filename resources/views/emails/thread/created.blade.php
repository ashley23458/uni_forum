@component('mail::message')
    {{ __('messages.hello') }} **{{$thread->user->name}}**,

    {{ __('messages.message_created_thread') }} "{{ $thread->title  }}".

@component('mail::button', ['url' => route('thread.show', $thread->id)])
    {{ __('messages.view_thread') }}
@endcomponent

    {{ __('messages.thanks') }},
    University Forum
@endcomponent
