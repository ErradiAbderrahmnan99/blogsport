@extends('layouts.adminLayout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Articl</h1>

            <a href="{{route('add.articl')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus-circle fa-sm text-white-50"></i> Add Articl</a>
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
                            <th>Title</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($articls as $articl)
                            <tr class="OfferRow{{$articl -> id}}">
                                <td>{{$articl->title}}</td>
                                <td>{{$articl->date}}</td>
                                <td><img src="{{asset('img/blog/'.$articl->image)}}" width="100px" height="100px"></td>
                                <td>
                                    <!--Remove-->
                                    <a href="#" attr_id="{{$articl->id}}" class="btn btn-danger btn-circle Bdelete_btn">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!--/Remove-->

                                    <!--edit-->
                                    <a href="{{route('articledit',[$articl->ref,$articl->user_id])}}" class="btn btn-warning btn-circle">
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
    <script>
        $(document).on('click','.Bdelete_btn',function (e){
            e.preventDefault();
            var attrid = $(this).attr('attr_id');
            if(confirm("do you want to delete this file?")) {
                $.ajax({
                    type: 'post',
                    url: "{{route('deletarticl')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': attrid,
                    },
                    success: function (data) {
                        if (data.status == true) {
                            $('#success_msg').fadeIn(1000);
                            $('#success_msg').fadeOut(6000);
                        }
                        $('.OfferRow' + data.id).remove();
                    }, error: function (reject) {

                    }
                });
            }
        });
    </script>
@stop

