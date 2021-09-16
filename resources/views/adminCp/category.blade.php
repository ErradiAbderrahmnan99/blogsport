@extends('layouts.adminLayout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>

            <a href="{{route('add.category')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Category</a>
        </div>

        <!-- Content Row -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categorys</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>name</th>
                            <th>image</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($cates as $cate)
                            <tr class="OfferRow{{--$blog -> id--}}">
                                <td>{{$cate->name}}</td>
                                <td>
                                    <img src="{{asset('img/category/'.$cate->image)}}" width="100px" height="100px">
                                </td>
                                <td>
                                    <!--Remove-->
                                    <a href="#" blogs_id="blogId" class="btn btn-danger btn-circle Bdelete_btn">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!--/Remove-->

                                    <!--edit-->
                                    <a href="{{route('editcategory',$cate->ref_cat)}}" class="btn btn-warning btn-circle">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <!--/edit-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!--pagenition-->
                    <div class="d-flex justify-content-center">
                        {{--!! $blogs -> links() !!--}}
                    </div>
                    <!--pagenition-->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@stop

@section('script')

@stop

