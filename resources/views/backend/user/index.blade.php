@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User List</h1>
    </div>

    <!-- Content Row -->
        <div class="col-md-8 offset-2">
            @if (session()->has('msg'))
                <div class="alert alert-success">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-md-8 offset-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">User List</h6>
                <a href="{{route('users.create')}}" class="d-none d-sm-inline-block btn btn-outline-primary " style="float: right"><i
                    class="fas fa-plus fa-sm "></i> Create User</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key=>$user )
                                 <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger" onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{$user->id}}').submit();">Del</a>
                                    <form id="delete-form-{{$user->id}}" method="post"  action="{{route('users.destroy',$user->id)}}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection
@push('script')
 <!-- Page level plugins -->
 <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endpush
