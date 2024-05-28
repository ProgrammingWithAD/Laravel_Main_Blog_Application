@extends('layout.main')

@section('content')

<div class="card">
  <div class="card-header">
    <h3>{{$post->blog_title}}</h3>
  </div>
  <div class="card-body">
    <section> <img src="{{asset($post->blog_thumbnail)}}" alt="blog_thumbnail" ></section>
    <section>
      {!!$post->blog_content!!}
    </section>
  </div>
</div>


    


    

@endsection