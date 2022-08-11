@extends('frontend.layouts.app')
@section('content')
<div class="page-breadcrumb">

    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                    <th scope="col" style="width:10%;"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($getProduct as $value)
                                <?php
                                $getArrImage = json_decode($value['image'], true);
                                ?>
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td><img src="{{ asset('upload/image_product') }}/{{$getArrImage[0]}}" style="width:70px"></img></td>
                                    <td>{{$value->price}}</td>
                                    <td>
                                        <a href="{{url('product/edit',['Id'=>$value->id])}}"><i class="mdi mdi-account-edit"></i>Edit</a></br>
                                        <a href="{{url('product/delete',['Id'=>$value->id])}}"><i class="mdi mdi-delete"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>
        <a href="{{url('/product/add')}}"><button id="button" class="btn btn-success" style="float: right;">Add new</button></a>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>

@endsection