<nav class="navbar navbar-dark bg-dark active">
    <a class="navbar-brand pl-4 float-start" href="#">
        <img src="{{asset('images/logo.png')}}" /> SI Masbagia
    </a>

    <!-- Tombol hide sidebar -->
    <a @click="navOpen = !navOpen" style="cursor:pointer" class="mr-3 float-end">
        <span class="btn-close btn-close-white float-end"></span>
    </a>
</nav>
<ul class="nav">
    <!-- Menu item -->
    {{-- <x-menu-link route="admin.dashboard" icon="fas fa-tachometer-alt">Dashboard</x-menu-link> --}}
    @can('ePdrt')
    <x-menu-link route="admin.warga" icon="fas fa-users">Input Profil RT & RKM</x-menu-link>
    @endcan
    @can('eSuperAdmin')
    {{-- <x-menu-link route="admin.dashboard" icon="fas fa-cart-plus">RKM</x-menu-link> --}}
    <x-menu-link route="admin.pokmas" icon="fas fa-users">PokMas</x-menu-link>
    {{-- <x-menu-dropdown icon="fas fa-glasses" label="Monitoring">
        <x-menu-link route="admin.dashboard" icon="fas fa-user-tag">Korkel</x-menu-link>
        <x-menu-link route="admin.dashboard" icon="fas fa-user-edit">Korcam</x-menu-link>
        <x-menu-link route="admin.dashboard" icon="fas fa-user-tie">Korkot</x-menu-link>
        <x-menu-link route="admin.dashboard" icon="fas fa-user-shield">OPD</x-menu-link>
        
    </x-menu-dropdown> --}}
    @endcan
    <x-menu-link route="admin.monitoring" icon="fas fa-cart-plus">Monitoring</x-menu-link>
    @can('eSuperAdmin')
    <x-menu-dropdown icon="fas fa-tv" label="Info Beranda">
        <x-menu-link route="admin.slide" icon="fas fa-image">Slide</x-menu-link>
        <x-menu-link route="admin.informasi" icon="fas fa-file-alt">Berita</x-menu-link>
        <x-menu-link route="admin.widget" icon="fas fa-puzzle-piece">Info</x-menu-link>
    </x-menu-dropdown>
    <x-menu-dropdown icon="fas fa-wrench" label="Pengaturan">
        
        <x-menu-link route="admin.setting" icon="fas fa-building">Lembaga</x-menu-link>
        <x-menu-link route="admin.periode" icon="fas fa-building">Periode</x-menu-link>
        <x-menu-link route="admin.pendamping" icon="fas fa-users-cog">Wilayah Kerja</x-menu-link>
        <x-menu-link route="admin.akun" icon="fas fa-users-cog">Akun</x-menu-link>
        
    </x-menu-dropdown>
    @endcan
</ul>