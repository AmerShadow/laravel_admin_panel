@extends('layouts.adminlayout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="fas fa-list-alt    "></i>
            </div>
            <div>All Users
                <div class="page-title-subheading">You can add,remove, edit Users here.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{route('home')}}" class="black-text">Home</a></li>
                    <li class="list-inline-item">/</li>
                    <li class="list-inline-item"><a href="{{route('user.index')}}" class="black-text">All Users</a></li>
                </ul>

            </div>
        </div>    </div>
</div>
        <div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            @include('partials.alert')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="card-title">All Users</h5>
                    </div>
                    <div class="col-md-4 text-right mb-4">
                      <a href="{{route('user.create')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New User</a>
                    </div>
                </div>
                <table class="mb-0 table display" id="table_id" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Companies</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1?>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    @foreach ($user->companies as $company)
                                        {{$company->name}} ,
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('user.edit', $user->id)}}" class="label"><i class="fa fa-edit fa-1x" style="color: #000"></i> </a>
                                    <a href="{{route('user.delete',$user->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" class="label bg-red-active"><i class="fa fa-trash  fa-1x" style="color: #000"></i> </a>
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

