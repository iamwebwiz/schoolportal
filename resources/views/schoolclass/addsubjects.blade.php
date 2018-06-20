@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('content')
    <div class="row pt-3">
        <div class="col-md-10">
        <form action="{{route('schoolclass.storestudents', ['id' => $schoolclass->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
            <input type="hidden" class="form-control" id="name" placeholder="class" name="name" required value="{{$schoolclass->name}}">

            <select class="limitedNumbChosen form-control">            
                <option>Select Students</option>
                @foreach($students as $student)
                <option value="{{$student->id}}">{{$student->fullName}}</option>
                @endforeach
            </select>
            
            
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
                      <tr>
                        <th>Student Id</th>
                        <th>Student full Name</th>
                      </tr>
                    </thead>
                    <tbody>
            </table>
                <button type="submit" class="btn btn-info ml-auto">Add Students</button>
            </form>
        </div>
        <div class="col-md-2">
        <input type="button" value="Get Values" class="btn btn-info" id="submit1" />
        </div>
    </div>


@endsection


@section('page-title')
    Add students to {{$schoolclass->section->name}} - {{$schoolclass->name}}
@endsection



    
@section('scripts')
    $("#submit1").click(function () {
            {
                var selected = $('.limitedNumbChosen :selected');
            selected.each(function (a) {
                    $('#bootstrap-data-table').append('<tr><td><input type="disabled" class="form-control" value="'+$(this).val() +'" name="students[]"></td><td>'+$(this).text() +'</td></tr>');
                // $('#table1').append('<tr><td>'+$(this).text()+'</td></tr>');
                //if you need ah text like days do with that
                });
            }
        });
@endsection