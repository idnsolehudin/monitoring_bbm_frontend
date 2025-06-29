@props(['title'])
<x-header :title="$title">
</x-header>
@if (session('user')['status'] === 'admin')
<x-navbar></x-navbar>
@endif
<x-top-navbar></x-top-navbar>
{{ $slot }}
<x-footer></x-footer>