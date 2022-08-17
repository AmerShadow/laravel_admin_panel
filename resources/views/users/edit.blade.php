@extends('layouts.adminlayout')
@section('content')
    <style>

    </style>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-list-alt   "></i>
                </div>
                <div> Edit User

                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{route('home')}}" class="black-text">Home</a></li>
                        <li class="list-inline-item">/</li>
                        <li class="list-inline-item"><a href="{{route('user.index')}}" class="black-text">All Users</a></li>
                        <li class="list-inline-item">/</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Edit User</h5>
                    @include('partials.alert')
                    <form class="needs-validation" novalidate method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class=" mb-3">
                            <label for="validationCustom01">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="User Name"
                                value="{{$user->name}}" required>
                        </div>

                        <div class=" mb-3">
                            <label for="validationCustom01">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="validationCustom01" placeholder="User email"
                                value="{{$user->email}}" required>
                        </div>

                        <div class=" mb-3">
                            <label for="validationCustom01">Mobile <span class="text-danger">*</span></label>
                            <input type="text" name="mobile" class="form-control" id="validationCustom01" placeholder="User Mobile"
                                value="{{$user->phone}}" required>
                        </div>

                        <div class=" mb-3">
                            <label for="validationCustom01">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" id="validationCustom01" placeholder="User password"
                                value="" required>
                        </div>


                        <div class=" mb-3">
                            <label for="validationCustom01">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" id="validationCustom01" placeholder="Confirm password"
                                value="" required>
                        </div>

                        <div class="form-group">
                            <strong>User Companies:</strong>
                            <select id='myselect' name="companies[]" multiple>
                                <option value="">Select An Option</option>
                                    @foreach($companies as $company)
                                        @if ($user->companies->where('id', $company->id)->count())
                                            <option value="{{$company->id}}" selected>{{ $company->name }}</option>
                                        @else
                                            <option value="{{$company->id}}">{{ $company->name }}</option>
                                        @endif
                                    @endforeach
                            </select>
                        </div>



                        <button class="btn btn-success" type="submit">Edit User</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

@endsection

