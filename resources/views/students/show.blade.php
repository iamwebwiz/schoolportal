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
                    <p>{{$student->fullName}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Address :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$student->address}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Date of Birth :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$student->dateOfBirth}}</p>
                </div>
            </div>
                <div class="row">
                <div class="col-md-4">
                    <p>Date of Admission :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$student->dateOfAdmission}}</p>
                </div>
            </div>

             <div class="row">
                <div class="col-md-4">
                    <p>Peculiarities :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$student->peculiarities}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Parents :</p>
                </div>
                <div class="col-md-8 detail-display">
                <p>Parents</p>
                <br><p>Relationship</p>
                </div>
            </div>
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
                                @if ($student->image)
                                    <img class="rounded-circle mx-auto d-block" src="{{asset($student->image)}}" alt="{{$student->fullName}}" width="300px">
                                    @else
                                    <img class="rounded-circle mx-auto d-block" src="{{asset('images/avatar.png')}}" alt="{{$student->fullName}}" width="300px">
                                    @endif
                                    <h5 class="text-sm-center mt-2 mb-1">{{$student->fullName}}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-user"></i>({{$student->gender}}) School Class - <i>{{$student->status}}</i> <br>
                                    @if($student->section)
                                    <a href="{{ route('sections.show', ['id' => $student->section->id])}}">{{ $student->section->name }}</a>
                                    @else
                                    <a href="{{route('students.edit', ['id' => $student->id])}}">Please add School Section</a>
                                    @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                   Parent phone <br>
                                    Parent email
                                </div>

                                <div class="card-text text-sm-center mt-3">
                                    <a class="btn btn-info btn-block" href="{{ route('students.edit', ['id' => $student->id])}}">Edit student Profile</a><br>
                                    <form action="{{ route('students.destroy', ['id' => $student->id])}}" method="POST">
                                        {{ csrf_field()}}
                                        {{ method_field('DELETE')}}
                                        <a class="btn btn-danger btn-block">Delete student Profile</a>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

@endsection


@section('page-title')
    Student Profile - {{$student->fullName}}
@endsection
