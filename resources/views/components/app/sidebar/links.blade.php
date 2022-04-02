<div class="list-group">
    <a href="{{ route('app.dashboard') }}" class="list-group-item list-group-item-action @if(Route::is('app.dashboard') || Route::is('home')) active @endif" aria-current="true">
        Dashboard
    </a>
    <a href="{{ route('app.profile.edit') }}" class="list-group-item list-group-item-action @if(Route::is('app.profile.edit')) active @endif">{{ trans('sentences.profile') }}</a>
    <a href="{{ route('app.profile.edit.avatar') }}" class="list-group-item list-group-item-action @if(Route::is('app.profile.edit.avatar')) active @endif">{{ trans('sentences.avatar') }}</a>
    <a href="{{ route('app.profile.edit.cover') }}" class="list-group-item list-group-item-action @if(Route::is('app.profile.edit.cover')) active @endif">{{ trans('sentences.cover') }}</a>
    <a href="{{ route('app.profile.edit.resume') }}" class="list-group-item list-group-item-action @if(Route::is('app.profile.edit.resume')) active @endif">{{ trans('sentences.resume') }}</a>
    <a href="{{ route('app.profile.edit.experiences') }}" class="list-group-item list-group-item-action @if(Route::is('app.profile.edit.experiences')) active @endif">{{ trans('sentences.experiences') }}</a>
    <a href="{{ route('app.profile.edit.course') }}" class="list-group-item list-group-item-action @if(Route::is('app.profile.edit.course')) active @endif">{{ trans('sentences.course') }}</a>
    {{-- <a class="list-group-item list-group-item-action disabled">A disabled link item</a> --}}
</div>
