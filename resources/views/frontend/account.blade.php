@extends('frontend.layouts.app')
@section('content')
<div class="col-lg-8 col-xlg-9 col-md-7" style="float: right ;">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="vui long nhap user" value="{{Auth::user()->name}}" name="name" class="form-control form-control-line">
                    </div>
                    @error('name')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="johnathan@admin.com" name="email" value="{{Auth::user()->email}}" class="form-control form-control-line" name="example-email" id="example-email">
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
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="123 456 7890" name="address" value="{{Auth::user()->address}}" class="form-control form-control-line">
                    </div>
                    @error('address')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Country</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Thua Thien Hue" name="country" value="{{Auth::user()->country}}" class="form-control form-control-line">
                    </div>
                    @error('country')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Avatar</label>
                    <div class="col-md-12">
                        <input type="file" placeholder="Thua Thien Hue" name="avatar" class="form-control form-control-line">
                    </div>
                    @error('avatar')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Update account</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<h2>Account</h2>
<div class="panel-group category-products" id="accordian">
    <!--category-productsr-->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="/account">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    Account
                </a>
            </h4>
        </div>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="/product">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Product
                        </a>
                    </h4>
                </div>
                @endsection