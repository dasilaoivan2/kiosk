{{--<iframe width="1195" height="672" src="https://www.youtube.com/embed/ws8w6nd4j6c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}

{{--<div class="embed-responsive embed-responsive-16by9">--}}
{{--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ws8w6nd4j6c?autoplay=1&loop=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>--}}
{{--</div>--}}

{{--<div class="embed-responsive embed-responsive-16by9">--}}
{{--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8JzZWwXSoMs?autoplay=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"  allowfullscreen></iframe>--}}
{{--</div>--}}

<div class="col">


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100" src="public/storage/jpgadds/2.jpg"  alt="First slide">
            </div>

            @foreach ($files as $file)
                <div class="carousel-item">
                    <img class="d-block w-100" src="public/storage/jpgadds/{{basename($file)}}"  alt="First slide">
                </div>
            @endforeach

        </div>

    </div>

</div>