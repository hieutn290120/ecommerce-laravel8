@extends('frontend.layouts.app')
@section('content')
<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="vui long nhap user" value="" name="name" class="form-control form-control-line">
                    </div>
                    @error('name')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" placeholder="johnathan@admin.com" name="email" value="" class="form-control form-control-line" name="example-email" id="example-email">
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
                    <label class="col-md-12">Phone No</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="123 456 7890" name="phone" class="form-control form-control-line">
                    </div>
                    @error('phone')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="col-md-12">Message</label>
                    <div class="col-md-12">
                        <textarea rows="5" class="form-control form-control-line" name="message"></textarea>
                    </div>
                    @error('message')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Thua Thien Hue" name="address" class="form-control form-control-line">
                    </div>
                    @error('address')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>

                <div class="form-group">

                    <label class="col-sm-12">Select Country</label>
                    <div class="col-sm-12">
                        <input type="text" name="country">
                        <!-- <select class="form-control form-control-line"  name="country">
                                                
                                            </select> -->
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
                        <button class="btn btn-success">Register</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection