@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        
       

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>Bill #</th>
                                    <th>Customer</th>
                                    <th>Cur. Reading</th>
                                    <th>Prev. Reading</th>
                                    <th>Bill Month</th>
                                    <th>Tot. KWH</th>
                                    <th>Tot. Energy Charge</th>
                                    <th>Final Bill</th>
                                   
                                    <th>Action</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bills as $bill)
                                <tr>
                                    <td>{{$bill->billnumber}}</td>
                                    <td>{{$bill->user->lastname.' '.$bill->user->firstname}}</td>
                                    <td>{{$bill->currentreading}}</td>
                                    <td>{{$bill->previousreading}}</td>
                                    <td>{{$bill->billmonth}}</td>
                                    <td>{{$bill->totalkwh}}</td>
                                    <td>&#8358;{{number_format($bill->totalecharge,2)}}</td>
                                    <td>&#8358;{{number_format($bill->finalbill,2)}}</td>

                                    {{-- <td><a href="{{ route('billing.edit',$bill->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td> --}}
                                    {{-- <td>
                                        <form id="delete-form-{{$bill->id}}" style="display: none"
                                            action="{{ route('billing.destroy',$bill->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$bill->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td> --}}
                                    <td><a href="{{ route('billing.sendsms',$bill->id) }}" class="btn btn-success btn-sm btn-block"><span class="fa fa-send-o"></span> Send Bill</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Bill #</th>
                                    <th>Customer</th>
                                    <th>Cur. Reading</th>
                                    <th>Prev. Reading</th>
                                    <th>Bill Month</th>
                                    <th>Tot. KWH</th>
                                    <th>Tot. Energy Charge</th>
                                    <th>Final Bill</th>
                                   
                                   
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
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

@endsect