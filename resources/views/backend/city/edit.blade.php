@extends('layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update State</h1>
        <a href="{{route('countries.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-left-arrow fa-sm text-white-50"></i>Back</a>
    </div>



    <div class="col-md-6 offset-3 mb-5 ">
        <div class="card">
            <div class="card-header">{{ __('Update City') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('cities.update',$city->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                        <div class="col-md-6">
                            <select name="state_id" class="form-control @error('state_id') is-invalid @enderror">
                                <option value="">Select State </option>
                                @foreach ($states as $state )
                                    <option value="{{$state->id}}" {{ $state->id == $city->id ? 'selected':''}}>{{$state->name}}</option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$city->name) }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
