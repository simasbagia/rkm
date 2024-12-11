<!-- digunakan untuk membuat card pada dashboard admin -->
<div class="col-md-3 col-sm-6 mb-2">
    <div class="card {{$color}}">
        <div class="card-body d-flex">
            <i class="{{$icon}} text-white" style="font-size: 50px"></i>
            <div class="text-white ps-3">
                <h3><b>{{$data}}</b></h3>
                <h5>{{$slot}}</h5>
            </div>
        </div>
    </div>
</div>