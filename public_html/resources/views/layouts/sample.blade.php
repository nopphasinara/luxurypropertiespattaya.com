{{-- @component('alerts.danger')
    @slot('title')
        Forbidden
    @endslot

    You are not allowed to access this resource!
@endcomponent

@unless (Auth::check())
    You are not signed in.
@endunless --}}

{{-- @isset($records)
    // $records is defined and is not null...
@endisset --}}

{{-- @empty($records)
    // $records is "empty"...
@endempty --}}

{{-- @auth
    // The user is authenticated...
@endauth --}}

{{-- @guest
    // The user is not authenticated...
@endguest --}}

{{-- @auth('admin')
    // The user is authenticated...
@endauth --}}

{{-- @guest('admin')
    // The user is not authenticated...
@endguest --}}

{{-- @hasSection('navigation')
    <div class="pull-right">
        @yield('navigation')
    </div>

    <div class="clearfix"></div>
@endif --}}

{{-- @push('scripts')
    <script src="/example.js"></script>
@endpush

@stack('scripts') --}}

{{-- @includeWhen($boolean, 'view.name', ['some' => 'data']) --}}

{{-- @includeIf('view.name', ['some' => 'data']) --}}

{{-- $loop->index	The index of the current loop iteration (starts at 0).
$loop->iteration	The current loop iteration (starts at 1).
$loop->remaining	The iteration remaining in the loop.
$loop->count	The total number of items in the array being iterated.
$loop->first	Whether this is the first iteration through the loop.
$loop->last	Whether this is the last iteration through the loop.
$loop->depth	The nesting level of the current loop.
$loop->parent	When in a nested loop, the parent's loop variable. --}}

{{-- @switch($i)
    @case(1)
        First case...
        @break

    @case(2)
        Second case...
        @break

    @default
        Default case...
@endswitch --}}

{{-- @for ($i = 0; $i < 10; $i++)
    The current value is {{ $i }}
@endfor

@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@forelse ($users as $user)
    <li>{{ $user->name }}</li>
@empty
    <p>No users</p>
@endforelse

@while (true)
    <p>I'm looping forever.</p>
@endwhile --}}

{{-- @foreach ($users as $user)
    @if ($user->type == 1)
        @continue
    @endif

    <li>{{ $user->name }}</li>

    @if ($user->number == 5)
        @break
    @endif
@endforeach --}}

{{-- @foreach ($users as $user)
    @continue($user->type == 1)

    <li>{{ $user->name }}</li>

    @break($user->number == 5)
@endforeach --}}

{{-- @foreach ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif

    @if ($loop->last)
        This is the last iteration.
    @endif

    <p>This is user {{ $user->id }}</p>
@endforeach --}}

{{-- @foreach ($users as $user)
    @foreach ($user->posts as $post)
        @if ($loop->parent->first)
            This is first iteration of the parent loop.
        @endif
    @endforeach
@endforeach --}}

{{-- @includeFirst(['custom.admin', 'admin'], ['some' => 'data']) --}}

{{-- @each('view.name', $jobs, 'job', 'view.empty') --}}

{{-- @inject('metrics', 'App\Services\MetricsService')

<div>
    Monthly Revenue: {{ $metrics->monthlyRevenue() }}.
</div> --}}

{{-- abort_if(! Auth::user()->isAdmin(), 403); --}}

{{-- abort_unless(Auth::user()->isAdmin(), 403); --}}

{{-- $container = app(); --}}

{{-- $user = auth()->user(); --}}

{{-- $user = auth('admin')->user(); --}}

{{-- return back($status = 302, $headers = [], $fallback = false); --}}

{{-- $password = bcrypt('my-secret-password'); --}}

@include('layouts.header')

<div id="main" role="main">
  @yield('content')
</div><!-- /#main -->

@include('layouts.footer')
