<!-- Menampilkan tombol close pada mobile -->
@if ($posisi == 'Samping')
    <div class="btn-close float-end d-md-none" @click="navOpen = !navOpen"></div>
    <div class="mt-5 d-md-none"></div>
@endif

<!-- Menampilkan widget yang posisinya sesuai -->
@foreach ($widget as $w)
    @if ($posisi == 'Bawah') <div class="col-md-4 widget-item mb-2">
       @elseif($posisi == 'Tengah')
            <div class="col-md-4 widget-item mb-2">
            @else
                <div class="widget-item mb-2">
    @endif

    <h5 class="widget-title">{{ $w->judul }}</h5>
    <!-- jika konten [informasi] -->
    @if ($w->konten == '[informasi]')
        <ul class="list-group">
            <li class="list-group-item">
                <a class="text-decoration-none link-primary" href="/">Beranda</a>
            </li>
            @foreach ($informasi as $i)
                <li class="list-group-item">
                    <a class="text-decoration-none link-primary"
                        href="/informasi/{{ $i->id }}/{{ $i->judul }}">{{ $i->judul }}</a>
                </li>
            @endforeach
        </ul>
        <!-- jika konten [jurusan] -->
    @elseif($w->konten == '[jurusan]')
        <ul class="list-group">
            @foreach ($jurusan as $j)
                <li class="list-group-item">
                    <a class="text-decoration-none link-primary"
                        href="/jurusan/{{ $j->id }}/{{ $j->nama_jurusan }}">{{ $j->nama_jurusan }}</a>
                </li>
            @endforeach
        </ul>
    @elseif($w->posisi == 'Bawah' && $w->gambar != null)
        <div>
            <a href="{{ $w->link }}" target="_blank">
                <img style="margin:5px" width="80" height="80" src="/storage/widget/{{ $w->gambar }}"
                    alt="">
            </a>
        </div>
    @else
        <!-- konten lainya -->
        {!! $w->konten !!}
    @endif
    </div>
@endforeach
