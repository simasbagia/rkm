<!-- digunakan untuk membuat judul tahapan pada form pendaftaran -->
<div class="step d-flex p-1 ps-1
    @if($step + 1 >= $no) bg-primary @else bg-secondary @endif
    " style="width: 20%">
    <div class="me-2">
        <h4 style="
            width: 20px; 
            height: 20px; 
            background: #fff;
            line-height: 20px;
        " class=" text-center rounded-circle
            @if($step + 1 >= $no) text-primary @else text-secondary @endif
        ">{{$no}}</h4>
    </div>
    <h6>{{$label}}</h6>
</div>