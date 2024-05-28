@extends('layout.main')

@section('content')


    <div class="row">
        @foreach ($blog as $blogs)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{asset($blogs->blog_thumbnail)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$blogs->blog_title}}</h5>
                  <p class="card-text">
                    @php
        // Remove img tags from the content
        $contentWithoutImg = preg_replace('/<img[^>]+>/', '', $blogs->blog_content);
        //dd($contentWithoutImg);
        // Split the content into words
        $words = explode(' ', ($contentWithoutImg));

        // Limit to the first 20 words
        $limitedWords = array_slice($words, 0, 20);

        // Join the limited words back into a string
        $limitedContent = implode(' ', $limitedWords);
        $limitedContent = strip_tags($limitedContent);
       // dd($limitedContent);
    @endphp
                    {!!$limitedContent!!}...
                    </p>
                  <a href="{{url('post',$blogs->url)}}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>


    

@endsection