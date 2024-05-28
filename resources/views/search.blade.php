@extends('layout.main')

@section('content')


    {{-- <div class="row">
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
                    {!!$limitedContent!!}
                    </p>
                  <a href="{{url('post',$blogs->url)}}" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
        @endforeach
    </div> --}}

  
    <div class="row">
        @foreach ($blogs as $blog)
   
        <div class="card mb-4" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{asset($blog->blog_thumbnail)}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"> <h2>{{ $blog->blog_title }}</h2></h5>
                  <p class="card-text">   @php
                    // Remove img tags from the content
                    $contentWithoutImg = preg_replace('/<img[^>]+>/', '', $blog->blog_content);
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
                                {!!$limitedContent!!}...</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
    </div>

  
       
       
@endforeach

{{ $blogs->links() }} <!-- Pagination links -->
    

@endsection