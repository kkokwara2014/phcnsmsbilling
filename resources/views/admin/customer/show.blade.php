@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer Detail
            <small>Customer Information</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div>
                    <a href="{{ route('customer.index') }}" class="btn btn-primary btn-sm">
                        Back</a>
                    
                </div>

                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12" style="text-align: center">
                                        <img style="display: block;
                                        margin-left: auto;
                                        margin-right: auto;
                                        width: 50%;" src="{{url('user_images',$customer->userimage)}}" alt=""
                                            class="img-responsive img-rounded" width="180" height="180">

                                        <p>
                                            <h3>{{$customer->lastname.' '.$customer->firstname}}</h3>
                                        </p>
                                        <hr>
                                        
                                    <div>Email : {{$customer->email}} </div>
                                    <div>Phone : {{$customer->phone}}</div>
                                    

                                    <hr>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="col-md-8">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Billing Information</h3>
                                    <hr>
                                    <ul class="list-group">
                                        {{-- @forelse ($regcourses as $regcourse)
                                        <li class="list-group-item">
                                        {{$regcourse->course->title.' - '.$regcourse->course->code}} <span class="pull-right">{{$regcourse->course->semester->name.', '.$regcourse->course->acadsession}}</span>
                                        </li>
                                        @empty
                                        <p style="background-color: crimson;" class="badge badge-info"><strong>No
                                                Registered Courses yet!</strong></p>
                                        @endforelse --}}
                                    </ul>
                                
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
        </div>
</div>


</section>
<!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
{{-- <section class="col-lg-5 connectedSortable"> --}}


{{-- </section> --}}
<!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection