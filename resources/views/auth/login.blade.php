<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ url('backend/libraries/bootstrap-4.5.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/libraries/style.css') }}">
</head>

<body>
    <section class="login d-flex flex-column">
        <div class="container">
            <div class="row login-content justify-content-center">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Silahkan Login!</h5>
                            <form method="post" action="{{ route('login') }}" class="mt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">

                                    @error('email')
                                        <small class="text-muted">{{ $message }}</small>
                                    @enderror                                  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <small class="text-muted">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-log btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-auto" style="color: #ababab">
            <span>&copy; PT. Duta Jaya Friztama - 2022</span>
        </div>
    </section>
</body>

</html>