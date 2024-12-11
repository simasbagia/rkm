<x-app-layout>
    @can('eSuperAdmin')
    <x-slot name="header">
        Akun
    </x-slot>
    <livewire:admin.akun-table />
    @else
    {{"Urip ibarat mung mampir ngombe, nek arep ngombe sing ngati-ati"}}
    @endcan
</x-app-layout>