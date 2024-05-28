<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">LaraBlog</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="/" aria-current="page">Home
                        <span class="visually-hidden">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">

                        @php
                        //$data = DB::table('my_table')->get(); // Fetch data using query builder
                        $field_fetch = App\Models\Category::all(); // Or you can use Eloquent:
                        @endphp

                        @foreach ($field_fetch as $item)

                        <a class="dropdown-item" href="{{url('category',$item->id)}}">{{$item->category}}</a>
                        {{-- <option value="{{ $item->id }}" {{$selected}}>{{ $item->category }}</option> --}}
                        @endforeach
                        {{-- <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a> --}}
                    </div>
                </li>
            </ul>
            @guest
            <a href="{{route('register')}}" class="btn btn-warning m-2">Register</a>
            <a href="{{route('login')}}" class="btn btn-primary m-2">Login</a>
            @else

            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Account <i class="fa fa-user me-1"> </i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{route('dashboard')}}">Account Settings</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>


            @endguest
        </div>
    </div>
</nav>