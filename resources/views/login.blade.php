@extends('base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="email"/>
                                <label for="inputEmail">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password"/>
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="remember" name="remember" />
                                <label class="form-check-label" for="inputRememberPassword">Remember me</label>
                            </div>
                            @csrf
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <input type="submit" class="btn btn-primary" value="Login">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="{{ route('register')  }}">Need an account? Sign up!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
