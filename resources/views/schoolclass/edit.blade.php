@extends('layouts.app')

@section('content')

            <form action="{{route('schoolclass.update', ['id' => $schoolclass->id])}}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  {{method_field('PUT')}}
             <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="section">School Section</label>
                    <select name="section" class="form-control" id="">
                    <option value="{{$schoolclass->section_id}}"selected>{{$schoolclass->section->name}}</option>
                    @foreach($sections as $section)
                    <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                
                    <label for="name">Class Name</label>
                    <input type="text" class="form-control" id="name" placeholder="class" name="name" required value="{{$schoolclass->name}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="session">Session</label>
                    <select name="session" class="form-control" id="">
                    <option value="{{$schoolclass->session_id}}"selected>{{$schoolclass->session->session}}</option>
                    @foreach($sessions as $session)
                    <option value="{{$session->id}}">{{$session->session}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="teacher">Teacher</label>
                    
                    <p> @foreach($schoolclass->staff as $staff)
                        <a href="{{route('staff.show', ['id'=>$staff->id])}}">{{$staff->fullName}}</a>
                        @endforeach</p>
                    <select name="staff" class="form-control" id="">
                    <option value="" selected>Choose Staff</option>
                    @foreach($staff as $staff)
                    <option value="{{$staff->id}}">{{$staff->fullName}}</option>
                    @endforeach
                    </select>
                </div>
            </div>    
           
             <div class="form-row">
            <div class="col-md-12 form-control">
            <button type="submit" class="btn btn-primary btn-block">Add Class</button>
        </div>
        </div>
            </form>


@endsection

@section('page-title')
    Edit Class Profile for {{$schoolclass->name}}
@endsection