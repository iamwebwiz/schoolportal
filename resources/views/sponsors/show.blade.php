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
                    <p>{{$sponsor->title}} {{$sponsor->fullName}} </p>
                </div>
            </div>

             <div class="row">
                <div class="col-md-4">
                    <p>Child(ren)/Ward(s) :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>Children and relatioship</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <p>Address :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$sponsor->address}}</p>
                </div>
            </div>

            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Occupation :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$sponsor->occupation}}</p>
                </div>
            </div>

        @if( $sponsor->designation =='Teacher' &&  $sponsor->status =='active')
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
        <div class="col-md-5">
         <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                @if ($sponsor->image)
                                    <img class="rounded-circle mx-auto d-block" src="{{asset($sponsor->image)}}" alt="{{$sponsor->fullName}}" width="300px">
                                    @else
                                    <img class="rounded-circle mx-auto d-block" src="{{asset('images/avatar.png')}}" alt="{{$sponsor->fullName}}" width="300px">
                                    @endif
                                    <h5 class="text-sm-center mt-2 mb-1">{{$sponsor->fullName}}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-user"></i><i>Sponsor status from student table</i> <br>
                                    Username and details from users table
                                    </div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    {{$sponsor->phone}} <br>
                                    {{$sponsor->email}}
                                </div>

                                <div class="card-text text-sm-center mt-3">
                                    <a class="btn btn-info btn-block" href="{{ route('sponsors.edit', ['id' => $sponsor->id])}}">Edit sponsor Profile</a><br>
                                   
                                    <form action="{{ route('sponsors.destroy', ['id' => $sponsor->id])}}" method="POST">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

@endsection


@section('page-title')
    Sponsor Profile - {{$sponsor->fullName}}
@endsection
