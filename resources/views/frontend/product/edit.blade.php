@extends('frontend.layouts.app')
@section('content')
<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            @foreach($product as $value)
            <?php
            $getArrImage = json_decode($value['image'], true);
            // dd($value['image']);
            ?>
            <form class="form-horizontal form-material" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" placeholder="Name" value="{{$value->name}}" name="name" class="form-control form-control-line">
                    </div>
                    @error('name')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" placeholder="Price" value="{{$value->price}}" name="price" class="form-control form-control-line">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="category">
                            <option>{{$value->category}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="brand">
                            <option>{{$value->brand}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="status">
                            <option class="sale">{{$value->status}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="text" value="{{$value->sale}}" name="sale" placeholder="%" class="form-control form-control-line form-sale">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">

                    <div class="col-md-12">
                        <input type="text" value="{{$value->company}}" placeholder="Company-profile" name="company" class="form-control form-control-line">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-12">Avatar</label>
                    <div class="col-md-12">
                        <input type="file" multiple="multiple" name="image[]" value="$getArrImage" class="form-control form-control-line">
                    </div>
                    @error('avatar')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" value="{{$value->details}}" placeholder="Details" name="details" class="form-control form-control-line">
                    </div>
                    @error('price')
                    <span style="color:red;">{{$message}}</span></br>
                    @enderror
                </div>
                <ul>
                    @foreach($getArrImage as $value)
                    <li>
                        <img src="{{ asset('upload/image_product') }}/{{$value}}" style="width: 40px;" alt="">
                        <input type="checkbox" name="imageDelete[]" value="{{$value}}" />
                    </li>
                    @endforeach
                </ul>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">EDIT PRODUCT</button>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection