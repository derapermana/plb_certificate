@if (Auth::guard('web')->check())
    <p class="text-success">
        You are logged in as a <strong>USER</strong>
        @if(Auth::user()->hasAccess('pelatihan.c'))
            Ada
        @endif
    </p>
@else
    <p class="text-danger">
        You are logged out as a <strong>USER</strong>
    </p>
@endif

@if (Auth::guard('guru')->check())
    <p class="text-success">
        You are logged in as a <strong>GURU</strong>
    </p>
@else
    <p class="text-danger">
        You are logged out as a <strong>GURU</strong>
    </p>
@endif
