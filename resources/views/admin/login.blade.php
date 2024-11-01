

<link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 mt-md-5">
            <form method="POST" action="{{ route('admin.login') }}">
                <div class="form-group">
                    @csrf
                    <label for="exampleInputEmail1">Login</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter login">
                    {{--        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
