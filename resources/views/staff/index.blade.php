@extends('layouts.app')

@section('content')


 @if($staff->count() > 0 )
    <div class="card">
    <div class="card-body">
    <div class="table-responsive">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>picture</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Staff Type</th>
                        <th>Designation</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($staff as $staff)
                      <tr class='clickable-row' data-href="{{ route('staff.show', ['id' => $staff->id])}}">
                        <td>
                        @if ($staff->image)
                        <img src="{{$staff->image}}" alt="{{$staff->fullName}}" width="100px">               
                        @else
                        <img src="{{asset('images/avatar.png')}}" alt="{{$staff->fullName}}" width="100px">  
                        @endif
                         </td>
                        <td>{{$staff->fullName}}</td>
                        <td>{{$staff->gender}}</td>
                        <td>{{$staff->designation}}</td>
                        <td>{{$staff->staffType}}</td>
                        <td>
                        <ul class="list-group">
                        @foreach($staff->sections as $section)
                        <li class="list-group-item">
                        {{$section->name}}</li>
                        @endforeach
                        </ul></td>
                        <td>{{$staff->status}}</td>
                        <td> 
                        <div class="row">
                        &nbsp;&nbsp;
                        <a href="{{ route('staff.edit', ['id' => $staff->id])}}" class="btn btn-sm btn-info">Edit</a>  
                        &nbsp;
                        <form action="{{ route('staff.destroy', ['id' => $staff->id])}}" method="POST">
                        {{ csrf_field()}}
                        {{ method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        
                        </form>
                        </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
    </table>
    </div>
    </div>
    </div>

    @else 

    <h3>No Staff added yet.</h3><br>
    <a class="btn btn-info" href="{{route('staff.create')}}">Add Staff</a>

    @endif


@endsection

@section('page-title')

    All Staff
@endsection