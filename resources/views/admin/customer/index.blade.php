@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer
            <small>All Customer</small>
        </h1>
        {{-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
        <br>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Customer
        </button>
    </section>



    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Supervisor
        </button> --}}

                {{-- @if (Auth::user()->role->id==3)
        <a href="{{route('course.index')}}" class="btn btn-success">
                <span class="fa fa-eye"></span> Course
                </a>

                @endif --}}
                <br>

                <div class="row">
                    <div class="col-md-12">

                        {{-- for messages --}}
                        {{-- @if (session('success'))
                <p class="alert alert-success">{{ session('success') }}</p>
                        @endif --}}

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <table id="example1" class="table table-responsive table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                            <th>View Details</th>

                                            <th>Edit</th>

                                            @if (Auth::user()->role->id==1)
                                            <th>Delete</th>
                                            @endif



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                        @if((Auth::user()->id==$customer->id||Auth::user()->role->id==2||Auth::user()->role->id==1))
                                        <tr>
                                            <td>{{$customer->lastname}}</td>
                                            <td>{{$customer->firstname}}</td>

                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td><a href="{{ route('bill',$customer->id)}}"
                                                    class="btn btn-success btn-sm btn-block">Bill</a>
                                                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                            </td>
                                            <td style="text-align: center">
                                                <a href="{{ route('customer.show',$customer->id) }}"><span
                                                        class="fa fa-eye fa-2x text-primary"></span></a>
                                            </td>
                                            {{-- <td>
                                                @if ($customer->isactive==1)
                                                <span class="fa fa-check-circle fa-2x text-success"></span>
                                                @else
                                                <span class="fa fa-close fa-2x text-danger"></span>
                                                @endif

                                            </td> --}}
                                            {{-- @if (Auth::user()->role->id==1)
                                            <td>
                                                @if ($customer->isactive==1)

                                                <form id="delete-form-{{$customer->id}}" style="display: none"
                                            action="{{ route('customer.deactivate',$customer->id) }}"
                                            method="post">
                                            {{ csrf_field() }}

                                            </form>
                                            <a href="" onclick="
                                                                            if (confirm('Are you sure you want to Deactivate this?')) {
                                                                                event.preventDefault();
                                                                            document.getElementById('delete-form-{{$customer->id}}').submit();
                                                                            } else {
                                                                                event.preventDefault();
                                                                            }
                                                                        "
                                                class="btn btn-danger btn-sm btn-block">Deactivate
                                            </a>
                                            @else

                                            <form id="delete-form-{{$customer->id}}" style="display: none"
                                                action="{{ route('customer.activate',$customer->id) }}" method="post">
                                                {{ csrf_field() }}

                                            </form>
                                            <a href="" onclick="
                                                                            if (confirm('Are you sure you want to Activate this?')) {
                                                                                event.preventDefault();
                                                                            document.getElementById('delete-form-{{$customer->id}}').submit();
                                                                            } else {
                                                                                event.preventDefault();
                                                                            }
                                                                        " class="btn btn-success btn-sm btn-block">
                                                Activate
                                            </a>

                                            @endif
                                            </td>
                                            @endif --}}



                                            <td style="text-align: center">
                                                @if (Auth::user()->id==$customer->id)
                                                <a href="{{ route('customer.edit',$customer->id) }}"><span
                                                        class="fa fa-edit fa-2x text-primary"></span></a>
                                                @endif
                                            </td>


                                            @if (Auth::user()->role->id==1)
                                            <td style="text-align: center">

                                                <form id="delete-form-{{$customer->id}}" style="display: none"
                                                    action="{{ route('customer.destroy',$customer->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>
                                                <a href="" onclick="
                                                                if (confirm('Are you sure you want to delete this?')) {
                                                                    event.preventDefault();
                                                                document.getElementById('delete-form-{{$customer->id}}').submit();
                                                                } else {
                                                                    event.preventDefault();
                                                                }
                                                            "><span class="fa fa-trash fa-2x text-danger"></span>
                                                </a>

                                            </td>
                                            @endif
                                        </tr>
                                        @elseif((Auth::user()->role->id==1))
                                        <tr>
                                            <td>{{$customer->lastname}}</td>
                                            <td>{{$customer->firstname}}</td>

                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td><a href="#" class="btn btn-success btn-sm btn-block">Bill</a></td>
                                            <td style="text-align: center">
                                                <a href="{{ route('customer.show',$customer->id) }}"><span
                                                        class="fa fa-eye fa-2x text-primary"></span></a>
                                            </td>
                                            {{-- <td>
                                                @if ($customer->isactive==1)
                                                <span class="fa fa-check-circle fa-2x text-success"></span>
                                                @else
                                                <span class="fa fa-close fa-2x text-danger"></span>
                                                @endif

                                            </td> --}}
                                            {{-- @if (Auth::user()->role->id==1)

                                            <td>

                                                @if ($customer->isactive==1)

                                                <form id="delete-form-{{$customer->id}}" style="display: none"
                                            action="{{ route('customer.deactivate',$customer->id) }}"
                                            method="post">
                                            {{ csrf_field() }}

                                            </form>
                                            <a href="" onclick="
                                                       if (confirm('Are you sure you want to Deactivate this?')) {
                                                                                    event.preventDefault();
                                                           document.getElementById('delete-form-{{$customer->id}}').submit();
                                                           } else {
                                                           event.preventDefault();
                                                          }
                                                         " class="btn btn-danger btn-sm btn-block">Deactivate
                                            </a>
                                            @else

                                            <form id="delete-form-{{$customer->id}}" style="display: none"
                                                action="{{ route('customer.activate',$customer->id) }}" method="post">
                                                {{ csrf_field() }}

                                            </form>
                                            <a href="" onclick="
                                                                                if (confirm('Are you sure you want to Activate this?')) {
                                                                                    event.preventDefault();
                                                                                document.getElementById('delete-form-{{$customer->id}}').submit();
                                                                                } else {
                                                                                    event.preventDefault();
                                                                                }
                                                                            " class="btn btn-success btn-sm btn-block">
                                                Activate
                                            </a>

                                            @endif

                                            </td>
                                            @endif --}}


                                            <td style="text-align: center">
                                                @if (Auth::user()->id==$customer->id)

                                                <a href="{{ route('customer.edit',$customer->id) }}"><span
                                                        class="fa fa-edit fa-2x text-primary"></span></a>

                                                @endif
                                            </td>


                                            <td style="text-align: center">

                                                <form id="delete-form-{{$customer->id}}" style="display: none"
                                                    action="{{ route('customer.destroy',$customer->id) }}"
                                                    method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('DELETE')}}
                                                </form>
                                                @if (Auth::user()->role->id==1)
                                                <a href="" onclick="
                                                                    if (confirm('Are you sure you want to delete this?')) {
                                                                        event.preventDefault();
                                                                    document.getElementById('delete-form-{{$customer->id}}').submit();
                                                                    } else {
                                                                        event.preventDefault();
                                                                    }
                                                                "><span class="fa fa-trash fa-2x text-danger"></span>
                                                </a>

                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Surname</th>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                            <th>View Details</th>

                                            <th>Edit</th>

                                            @if (Auth::user()->role->id==1)
                                            <th>Delete</th>
                                            @endif

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

                {{-- Data input modal area --}}
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog modal-lg">

                        <form action="{{ route('customer.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"><span class="fa fa-user"></span> Add Customer</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Last Name</label>
                                                <input id="lastname" type="text"
                                                    class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                                    name="lastname" value="{{ old('lastname') }}" required autofocus
                                                    placeholder="Last Name">

                                                @if ($errors->has('lastname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                            <div class="form-group">
                                                <label for="">First Name</label>
                                                <input id="firstname" type="text"
                                                    class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                                    name="firstname" value="{{ old('firstname') }}" required autofocus
                                                    placeholder="First Name">

                                                @if ($errors->has('firstname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                            <div class="form-group">
                                                <label for="">Email Address</label>
                                                <input id="email" type="email"
                                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                    name="email" value="{{ old('email') }}" required autofocus
                                                    placeholder="Email">

                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="">Phone</label>
                                                <input id="phone" type="tel"
                                                    class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                    name="phone" value="{{ old('phone') }}" required placeholder="Phone"
                                                    maxlength="11">

                                                @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="">State of Residence</label>
                                                <select name="location_id" class="form-control" @error('location_id') is-invalid
                                                    @enderror value="{{ old('location_id') }}" required>
                                                    <option selected="disabled">Select Location</option>
                                                    @foreach ($locations as $location)
                                                    <option value="{{$location->id}}">{{$location->name}}</option>
                                                    @endforeach
                                                </select>

                                                @error('location_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Residence Address</label>

                                                <textarea class="form-control" name="address" id="" cols="30"
                                                    rows="7">{{ old('address') }}</textarea>

                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input id="password" type="password"
                                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    name="password" required placeholder="Password">

                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="">Repeat Password</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required placeholder="Repeat Password">
                                            </div>
                                        </div>
                                    </div>



                                    {{-- hidden fields --}}

                                    <input type="hidden" name="role_id" value="{{'3'}}">


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->

                        </form>
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

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
