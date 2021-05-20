
@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')

<!-- Main Content -->
        <div class="col-md-9 mx-auto">
         @include('front.widgets.articlelist')
        </div>
@include('front.widgets.categoryWidget')
@endsection
