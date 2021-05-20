

    @foreach($blogs as $blogm)

    <div class="post-preview">
        <a href="{{route('single',[$blogm->getCategory->slug,$blogm->slug])}}">
            <h2 class="post-title">
                {{$blogm->title}}
            </h2>
            <img src="{{$blogm->image}}"/>
            <h3 class="post-subtitle">
                {{Str::limit($blogm->content,75)}}
            </h3>
        </a>
        <p class="post-meta">Kategori:
            <a href="#">{{$blogm->getCategory->name}}</a>

            <span class="float-right">{{$blogm->created_at->diffForHumans()}}</span></p>
    </div>

    @if(!$loop->last)
        <hr>
    @endif

@endforeach
<!-- en son satırdaki hr çizgisini kaldırmak için bu if kullanımını yapıyoruz.Documentation kısmında kullanımı var
                hatta last yerine first de yazabiliriz bu da en baştaki çizgiyi siler.-->
    {{$blogs->links()}}








