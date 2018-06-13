@extends('layouts.app')

@section('content')


 @if($schoolclasses->count() > 0 )
    <div class="row">
    <div class="card col-md-7">
    <div class="card-body">
    <div class="table-responsive">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Section</th>
                        <th>Class Name</th>
                        <th>Session</th>
                        <th>Teacher</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($schoolclasses as $schoolclass)
                      <tr class='clickable-row' data-href="{{ route('schoolclass.show', ['id' => $schoolclass->id])}}">
                        {{--  <td>{{$schoolclass->section}}
                         </td>  --}}
                        <td>{{$schoolclass->name}}</td>
                        {{--  <td>{{$schoolclass->session}}</td>  --}}
                        <td><a href="#" class="btn btn-info btn-xs">View Class Details</a></td>
                        <td> 
                        <td>
                        {{--  <ul class="list-group">
                        @foreach($schoolclass->sections as $section)
                        <li class="list-group-item">
                        {{$section->name}}</li>
                        @endforeach
                        </ul>  --}} Subjects
                        </td>
                        <div class="row">
                        &nbsp;&nbsp;
                        <a href="{{ route('schoolclass.edit', ['id' => $schoolclass->id])}}" class="btn btn-sm btn-info">Edit</a>  
                        &nbsp;
                        <form action="{{ route('schoolclass.destroy', ['id' => $schoolclass->id])}}" method="POST">
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
    <div class="row col-md-5">
    
    <a class="btn btn-info" href="{{route('schoolclass.create')}}">Add schoolclass</a>

    </div>
    </div>

    @else 

    <h3>No Class added yet.</h3><br>
    <a class="btn btn-info" href="{{route('schoolclass.create')}}">Add Class</a>

    @endif


@endsection

@section('page-title')

    All schoolclass
@endsection