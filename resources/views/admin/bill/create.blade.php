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
                                <label for="name">Bill Month</label>
                                <input id="datepickermonth" type="text" class="form-control" name="billmonth" placeholder="Bill Month">
                            </div>
                            <div>
                                <label for="name">Total KWh</label>
                                <span class="form-control" style="background-color: dodgerblue; color: floralwhite;" id="totalkwh"></span>
                            <input type="hidden" id="totalkwh" name="totalkwh">
                            </div>
                            <div>
                                <label for="name">Total Energy Charge</label>
                                <span class="form-control" style="background-color: peru; color: floralwhite;" id="totalecharge"></span>
                            </div>
                            <input type="hidden" name="chargeperkwh" id="chargeperkwh" value="150">
                            <input type="hidden" name="fixedmonthlyfee" id="fixedmonthlyfee" value="500">
                            <div>
                                <label for="name">Final Bill</label>
                                <span class="form-control" style="background-color: green; color: floralwhite;" id="finalbill"></span>
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