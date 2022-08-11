@extends('frontend.layouts.app')
@section('content')
<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal form-material" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" placeholder="Name" value="" name="name" class="form-control form-control-line">
                    </div>
                    @error('name')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" placeholder="Price" value="" name="price" class="form-control form-control-line">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="category">
                            @foreach($category as $value)
                            <option>{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="brand">
                            @foreach($brand as $value)
                            <option>{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="status">
                            <option class="sale">SALE</option>
                            <option class="new">NEW</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="text" value="" name="sale" placeholder="%" class="form-control form-control-line form-sale">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">

                    <div class="col-md-12">
                        <input type="text" value="" placeholder="Company-profile" name="company" class="form-control form-control-line">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Avatar</label>
                    <div class="col-md-12">
                        <input type="file" placeholder="Thua Thien Hue" multiple="multiple" name="image[]" class="form-control form-control-line">
                    </div>
                    @error('avatar')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" value="" placeholder="Details" name="details" class="form-control form-control-line">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">ADD PRODUCT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection