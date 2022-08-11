@extends('frontend.layouts.app')
@section('content')
<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="post">
                @csrf
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" name="email" value="" class="form-control form-control-line" name="example-email" id="example-email">
                    </div>
                    @error('email')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="password" value="" name="password" class="form-control form-control-line">
                    </div>
                    @error('password')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection