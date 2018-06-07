@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-7">
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p>Full Name :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$staff->title}} {{$staff->fullName}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Address :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$staff->address}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Date of Birth :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$staff->dateOfBirth}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Designation :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$staff->designation}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Date Employed :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$staff->dateOfEmployment}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Qualifications :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$staff->qualifications}}</p>
                </div>
            </div>
        @if( $staff->designation =='Teacher' &&  $staff->status =='active')
             <div class="row">
                <div class="col-md-4">
                    <p>Class :</p>
                </div>
                <div class="col-md-8 detail-display">
                <p>Class handled</p>
                </div>
            </div>
        @else
        @endif
        </div>
        </div>
        </div>
        <div class="col-md-5">
         <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                @if ($staff->image)
                                    <img class="rounded-circle mx-auto d-block" src="{{asset($staff->image)}}" alt="{{$staff->fullName}}" width="300px">               
                                    @else
                                    <img class="rounded-circle mx-auto d-block" src="{{asset('images/avatar.png')}}" alt="{{$staff->fullName}}" width="300px">  
                                    @endif
                                    <h5 class="text-sm-center mt-2 mb-1">{{$staff->fullName}}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-user"></i>({{$staff->gender}}) {{$staff->designation}} - <i>{{$staff->status}}</i> <br>
                                    {{$staff->section}}
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    {{$staff->phone}} <br>
                                    {{$staff->email}}
                                </div>
                                
                                <div class="card-text text-sm-center mt-3">
                                    <a class="btn btn-info btn-block" href="{{ route('staff.edit', ['id' => $staff->id])}}">Edit Staff Profile</a><br>
                                    <form action="{{ route('staff.destroy', ['id' => $staff->id])}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <a class="btn btn-danger btn-block">Delete Staff Profile</a>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

@endsection


@section('page-title')
    Staff Profile - {{$staff->fullName}}
@endsection