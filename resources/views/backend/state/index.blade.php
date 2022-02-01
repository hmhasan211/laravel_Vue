@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">State List</h1>
        <a href="{{route('states.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create State</a>
    </div>
    <div class="row">
    <!-- Content Row -->
        <div class="col-md-8 offset-2">
            @if (session()->has('msg'))
                <div class="alert alert-success">
                    {{session('msg')}}
                </div>
            @endif
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-md-6 offset-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">State List</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Country</th>
                                <th>State Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $key=>$state )
                                 <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$state->country->name}}</td>
                                <td>{{$state->name}}</td>
                                <td>
                                    <a href="{{route('states.edit',$state->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="" class="btn btn-danger" onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{$state->id}}').submit();">Del</a>
                                    <form id="delete-form-{{$state->id}}" method="post"  action="{{route('states.destroy',$state->id)}}" style="display: none">
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

    </div>
@endsection
@push('script')
 <!-- Page level plugins -->
 <script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
@endpush
