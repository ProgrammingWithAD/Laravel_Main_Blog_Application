<!doctype html>
<html lang="en">

<head>
    @include('layout.style')
</head>

<body>
  
   <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
       
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div>
    <!-- Bootstrap JavaScript Libraries -->
    @include('layout.footer')
    @include('layout.script')

<script>
@if (session('success'))
$.notify("{{ session('success')}}", "success");
    
@endif


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            $.notify("{{ $error }}", "error");
        @endforeach
    @endif
</script>

</body>

</html>
