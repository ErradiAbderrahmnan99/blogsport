@extends('layouts.adminLayout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Comment</h1>
        </div>

        <!-- Content Row -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Comment</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{----}}
                        <div class="mb-3 text-center">
                            <small class="alert alert-success" id="success_msg" style="display: none">
                                Message Publish
                            </small>
                        </div>
                    {{----}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Website</th>
                            <th>Comment</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Website</th>
                            <th>Comment</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr class="OfferRow{{$comment -> id}}">

                                <td>{{$comment->name}}</td>
                                <td>{{$comment->email}}</td>
                                <td>{{$comment->date}}</td>
                                <td>{{$comment->website}}</td>
                                <td>{{$comment->comment}}</td>
                                <td>

                                    <!--Remove-->
                                    <a href="#" attr_id="{{$comment->id}}" class="btn btn-danger btn-circle Bdelete_btn">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <!--/Remove-->

                                    <!--/edit-->
                                <div style="display: none">{{$statu = \App\Models\comment::select('id','valide')->find($comment->id)}}</div>
                                    @if($statu->valide == 1)
                                    <!--check non valide-->
                                        <a href="#" comment_id="{{$comment->id}}" style="background-color: green" class="btn btn-success btn-circle check_btn">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <!--/check non valide-->
                                    @else
                                        <a href="#" comment_id="{{$comment->id}}" class="btn btn-danger btn-circle check_btn">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    @endif
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
        $(document).on('click','.check_btn',function (e){
            e.preventDefault();
            var offer_id = $(this).attr('comment_id');
            if(confirm("do you want to Confirme this Comment?")) {
                $.ajax({
                    type: 'post',
                    url: "{{route('commentcheck')}}",
                    data: {
                        '_token': "{{csrf_token()}}",
                        'id': offer_id,
                    },
                    success: function (data) {
                        if (data.status == true) {
                            $('#success_msg').fadeIn(1000);
                            $('#success_msg').fadeOut(6000);
                            setTimeout(
                                function()
                                {
                                    location.reload();
                                }, 0010);
                        }
                        $('.OfferRow' + data.id).css("backgroundColor", "red") ;
                    }, error: function (reject) {

                    }
                });
            }
        });

        $(document).on('click','.Bdelete_btn',function (e){
            e.preventDefault();
            var attrid = $(this).attr('attr_id');
            if(confirm("do you want to delete this file?")) {
                $.ajax({
                    type: 'post',
                    url: "{{route('deletcomment')}}",
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

