
@extends('front.layouts.master')
@section('title',$category->name. '  Kategorisi  ' .count($blog). '  yazısı mevcut')
@section('content')

    @if(count($blog)>0)
      <div class="col-md-9 mx-auto">
          @foreach($blog as $blogm)

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
              {{$blog->links()}}
      </div>

    @else
        <div class="alert alert-danger">
            <h1>Bu kategoriye ait yazı bulunamadı</h1>
        </div>
    @endif
    @include('front.widgets.categoryWidget')
@endsection



