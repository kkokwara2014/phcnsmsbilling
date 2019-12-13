@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('billing.index') }}" class="btn btn-success">
           <span class="fa fa-eye"></span> All Billings
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-5">
                
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('billing.store') }}" method="post">
                            {{ csrf_field() }}

                            <div>
                                <label for="">Billing No.#</label>
                            <input style="background-color: dodgerblue; color:floralwhite" type="text" class="form-control" name="billnumber" value="{{'phcn'. rand(55000, 99955)}}" readonly>
                            </div>
                            
                            <div>
                                <label for="name">Current Meter Reading</label>
                                <input id="currentreading" type="text" class="form-control" name="currentreading">
                            </div>
                            <div>
                                <label for="name">Previous Meter Reading</label>
                                <input id="previousreading" type="text" class="form-control" name="previousreading">
                            </div>
                            <div>
                                <label for="name">Total KWh</label>
                                <span style="background-color: dodgerblue; color: floralwhite;" id="totalkwh"></span>
                            </div>
                            <input type="hidden" name="chargeperkwh" id="chargeperkwh" value="">
                            <input type="hidden" name="fixedmonthlyfee" id="fixedmonthlyfee" value="">
                            <div>
                                <label for="name">Final Bill</label>
                                <span style="background-color: green; color: floralwhite;" id="finalbill"></span>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Add Bill</button>
                            <a href="{{ route('billing.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
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