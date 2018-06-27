@extends('layouts.app')


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@section('content')
    <form action="{{route('attendance.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="row pt-3">
            <div class="col-md-9">

                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Presence</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($schoolclass->students as $student)
                                <tr>
                                    <td>
                                    {{$student->fullName}}
                                    <input hidden name="student[]" value="{{$student->id}}">
                                    </td>
                                    <td>
                                    <input type="checkbox" name="presence[]" class="form-control display-4" id="">
                                    </td>
                                    <td>
                                    <input type="text" name="note[]" id="" class="form-control">
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        </div>
        <div class="col-md-3">
            <div class="row mb-5">
                <label for="attddate">Date for Attendance</label>
                <input type="date" name="attddate" id="" class="form-control mb-5">
            </div>
            
            <input type="submit" value="Add Attendance for the day" class="form-control btn btn-info">
        </div>
    </form>
@endsection


@section('page-title')
    Daily Attendance {{$schoolclass->session->session}} - <a href="{{route('schoolclass.show', ['id'=> $schoolclass->id])}}">{{$schoolclass->name}}</a>
@endsection



