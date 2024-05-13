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
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control numInput" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Gender</label>
                           <select name="gender" id="gender" class="form-select" required>
                            <option value="">Select Gender</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                            <option value="OTHERS">OTHERS</option>
                           </select>
                        </div>
                        <div class="col-md-12">
                            <label for="">About</label>
                            <input type="text" name="about" id="about" class="form-control" required>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
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
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                $.notify("{{ $error }}", "error");
            @endforeach
        @endif

       
    </script>
</body>

</html>
