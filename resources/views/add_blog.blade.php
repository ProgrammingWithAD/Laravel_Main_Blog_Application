@extends('layout.test')

@section('content')
    <div class="main-content" id="miniaresult">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Add Blog</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('blog-add') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Blog Title</label>
                                            <input type="text" name="blog_title" id="blog_title" class="form-control">
                                        
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Blog Url</label>
                                            <input type="url" name="url" id="url" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="">Blog Content</label>
                                            <textarea name="blog_content" id="blog_content" class="form-control ckeditor" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Status</label>
                                            <select name="blog_status" id="blog_status" class="form-select">
                                                <option value="">Select Status</option>
                                                <option value="0">Draft</option>
                                                <option value="1">Public</option>
                                                <option value="2">Private</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Category</label>
                                            <select name="blog_category[]" id="blog_category" class="form-select select2"
                                                multiple="multiple">
                                                @php
                                                    //$data = DB::table('my_table')->get(); // Fetch data using query builder
                                                    $field_fetch = App\Models\Category::all(); // Or you can use Eloquent:
                                                @endphp

                                                @foreach ($field_fetch as $item)
                                                    @php
                                                        $selected =isset($row->blog_category) && in_array($item->id,explode(',', $row->blog_category))? 'selected': '';
                                                    @endphp
                                                    <option value="{{ $item->id }}" {{$selected}}>{{ $item->category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">

                                            <label for="">Thumbnail Image</label>
                                            <input type="file" name="blog_thumbnail" id="blog_thumbnail"
                                                class="form-control">
                                            <input type="hidden" name="old_thumb_img" id="old_thumb_img" value="{{ isset($row->blog_thumbnail) ? $row->blog_thumbnail : '' }}">
                                            <div class="prev_img">
                                                <a href=""> <img src="" alt="" height="50px"></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle me-2"></i>SUBMIT DETAILS</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

            </div> <!-- container-fluid -->
        </div>
    </div>
    @include('layout.script')
    <script src="{{ asset('libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
    <script>
        ClassicEditor
        .create( document.querySelector( '.ckeditor' ),{
            ckfinder: {
                uploadUrl: "{{route('fileupload').'?_token='.csrf_token()}}",
            }
        })
        .catch( error => {
              
        } );
    </script>

    <script>
        $(document).ready(function() {
    // Bind pritty_uri function to the oninput event of the input field with id 'title'
    $('#blog_title').on('input', function() {
        var value = $(this).val();
        pritty_uri(value); // Call the pritty_uri function with the input value
    });
});

function pritty_uri(value) {
    $.ajax({
        url: "{{route('generate_uri')}}",
        type: 'GET',
        data: { blog_title: value, generate_uri: true },
        success: function(data) {
            $('#url').val(data.pretty_url); // Update the value of the input field with the response data
        }
    });
}
        </script>
@endsection
