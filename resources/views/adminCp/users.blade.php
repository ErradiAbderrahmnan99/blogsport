@extends('layouts.adminLayout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>

        <!-- Content Row -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Blogs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="OfferRow$articl -> id">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                    <!--Remove-->
                                    <a href="#" blogs_id="#" class="btn btn-danger btn-circle Bdelete_btn">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!--/Remove-->

                                    <!--edit-->
                                    <a href="{{route('update.users',$user->id)}}" class="btn btn-warning btn-circle">
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

