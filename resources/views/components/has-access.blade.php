@if (Auth::guard('admin')->user()->hasAccess($permission))
    {{ $slot }}
@endif
