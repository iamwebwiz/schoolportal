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
                      {{--  <tr class='clickable-row' data-href="{{ route('staff.show', ['id' => $staff->id])}}">  --}}
                      <tr>
                        <td>{{$staff->image}}</td>
                        <td>{{$staff->fullName}}</td>
                        <td>{{$staff->gender}}</td>
                        <td>{{$staff->designation}}</td>
                        <td>{{$staff->staffType}}</td>
                        <td>{{$staff->section}}</td>
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

     {{--  <script> 
                jQuery(document).ready(function($) {
                    $(".clickable-row").click(function() {
                        window.location = $(this).data("href");
                    });
                });
                </script>  --}}
    @else 

    <h3>No Staff added yet.</h3><br>
    <a class="btn btn-info" href="{{route('staff.create')}}">Add Staff</a>

    @endif


@endsection

@section('page-title')

    All Staff
@endsection