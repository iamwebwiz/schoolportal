@extends('layouts.app')

@section('content')


 @if($students->count() > 0 )
    <div class="card">
    <div class="card-body">
    <div class="table-responsive">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>picture</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Class</th>
                        <th>Parents</th>
                        <th>Special Needs</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                      <tr class='clickable-row' data-href="{{ route('students.show', ['id' => $student->id])}}">
                        <td>
                        @if ($student->image)
                        <img src="{{$student->image}}" alt="{{$student->fullName}}" width="100px">               
                        @else
                        <img src="{{asset('images/avatar.png')}}" alt="{{$student->fullName}}" width="100px">  
                        @endif
                         </td>
                        <td>{{$student->fullName}}</td>
                        <td>{{$student->gender}}</td>
                        <td> School Class</td>
                        <td>Parents</td>
                        <td>
                        @if($student->Peculiarities)
                        {{$student->Peculiarities}}
                        @else
                        <p>None</p>
                        @endif
                        </td>
                        <td> 
                        <div class="row">
                        &nbsp;&nbsp;
                        <a href="{{ route('students.edit', ['id' => $student->id])}}" class="btn btn-sm btn-info">Edit</a>  
                        &nbsp;
                        <form action="{{ route('students.destroy', ['id' => $student->id])}}" method="POST">
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

    <h3>No students added yet.</h3><br>
    <a class="btn btn-info" href="{{route('students.create')}}">Add students</a>

    @endif


@endsection

@section('page-title')

    All students
@endsection