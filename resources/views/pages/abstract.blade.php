@extends('../blogContent')

@section('content')
    <h3 class="text-dark-color">
        บทความทางวิชาการ
    </h3>
    <hr class="text-base-color">


    <div class="abstract-grid">
        @foreach ($data['abstract'] as $abstractItem)
            <div class="abstract-container">
                <div class="abstract-item">
                    <div class="img" onclick="imgNewTab(this)">
                        <img src="{{ asset($data['path_image'].$abstractItem['image']) }}" alt="">
                    </div>
                    <div class="text-group">
                        <div class="title">
                            {{ $abstractItem['name'] }}
                        </div>
                        <div class="author">
                            {{ $abstractItem['author'] }}
                        </div>
                        <div class="date">
                            {{ $abstractItem['description'] }}
                        </div>
                        <a href="{{$abstractItem['link'] === null?'#':$abstractItem['link']}}" target="_blank" class="download-btn">
                            <i class="fa fa-download {{$abstractItem['link'] === null?'mute':''}}"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('js')
    <script>
        function imgNewTab(e) {
            let url = e.firstElementChild.getAttribute('src');
            window.open(url);
        }
    </script>
@stop
