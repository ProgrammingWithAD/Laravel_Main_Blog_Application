<!doctype html>
<html lang="en">

<head>
    <!-- Include your CSS styles here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Register</h4>
                </div>
                <div class="card-body">
                    <form id="registerForm" action="{{ route('register') }}" method="POST">
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
                                <button type="submit" class="btn btn-primary">Register yourself</button>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <a href="{{ route('login') }}" class="btn btn-link">Register already! Login yourself. </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Include your JavaScript files here -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
</body>

</html>