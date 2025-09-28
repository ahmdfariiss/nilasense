@auth
    @if (Auth::user()->role === 'admin')
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Admin Dashboard') }}
        </x-nav-link>
    @endif
@endauth
