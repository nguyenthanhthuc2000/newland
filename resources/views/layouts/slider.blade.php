{{--<div class="container">--}}
{{--{{dd($getSliders)}}--}}
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach($getSliders as $slider)
            @php
                $i++;
            @endphp
            <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
                <a href="{{ $slider->link }}" target="_blank">
                    <img src="{{asset('uploads/slider/'.$slider->image)}}"style="" class="d-block w-100 img-slider" alt="{{ $slider->description_img }}">
                </a>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{--</div>--}}
