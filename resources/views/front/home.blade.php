<x-front-layout>

    <!-- <div class="container-fluid" x-data="{ 'showModal' : false }"> -->

    <!-- sembunyikan modal jika ada event show-message dan tampilkan jika ada event edit-ready -->
    <!-- <div class="card" x-on:show-message.window="showModal = false" x-on:edit-ready.window="showModal = true"> -->
    <!-- slideshow gambar -->
    <div class="bg-light pt-2 pb-2">
        <div class="container">

            <div x-data x-init="new Splide($refs.splide, {
        type: 'loop',
        height : 'calc(80vh - 220px)',
	cover: true,   
        autoplay : true,
        }).mount();">
                <div class="splide" x-ref="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($slide as $s)
                            <li class="splide__slide" style="text-shadow: 0 0 5px #000">
                                <!-- <picture> -->
                                <img src="/storage/slide/{{$s->gambar}}" alt="">
                                <!-- <h3 class="text-center text-white" style="margin-top: calc(70vh - 150px); font-size: 50px">{{$s->judul}}</h3> -->
                                <div class="text-center text-white d-none d-md-block">
                                    <!-- <h5 style="padding: 0 100px">{{$s->deskripsi}}</h5> -->
                                </div>
                                <!-- </picture> -->
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- menampilkan status dibukanya pendaftaran-->

    <div class="bg-light">
        <div class="container">
            <div class="row pt-4 ">
                <div class="col-2"></div>
                <div class="col-8 text-white text-center ">
                    @foreach($widget as $w)
                    <a href="/link/{{$w->id}}" class="zoom-effect"><span class="kotak">
                            <img style="border-radius:10%" width="140" height="140" src="/storage/widget/{{$w->gambar}}" alt=""></span>
                    </a>
                    @endforeach
                    <!-- @if($periode and Carbon\Carbon::now()->isBetween($periode->tanggal_buka, $periode->tanggal_tutup))
                    <h3></h3> -->

                    <!-- @elseif($periode and Carbon\Carbon::now()->isAfter($periode->tanggal_buka))
                    <h3>c</h3>
                    @else
                    <h3>d</h3>
                    @endif -->

                    <!-- <span id="informasi"></span>
                    <a @click="document.getElementById('informasi').scrollIntoView()" class="btn btn-primary mb-2">
                        <i class="fas fa-info-circle"></i> Informasi
                    </a> -->

                </div>
                {{-- <div class="col-1"></div --}}

                <style type="text/css">
                    .kotak img {
                        -webkit-transition: 0.4s ease;
                        transition: 0.4s ease;

                    }

                    .zoom-effect:hover .kotak img {
                        -webkit-transform: scale(1.08);
                        transform: scale(1.08);
                    }
                </style>
            </div>
        </div>
    </div>
    </div>

    <div class="container mt-1">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <!-- menampilkan widget dengan posisi samping -->
                    <div class="col" style="flex-grow:0">
                        <div class="col sidebar-widget">
                            <x-front-widget posisi="Samping">
                            </x-front-widget>
                        </div>
                    </div>
                    <div class="col " style="flex-grow:8">

                        <!-- menampilkan informasi pada bagian konten -->
                        <div class="col ">
                            @foreach($informasi as $i)
                            <h5 class="page-title">{{$i->judul}}</h5>
                            {!! $i->konten !!}
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- menampilkan widget dengan posisi bawah -->
    <x-slot name="footer">
        <x-front-widget posisi="Bawah"></x-front-widget>
    </x-slot>
    <!-- </div>

    </div> -->

</x-front-layout>