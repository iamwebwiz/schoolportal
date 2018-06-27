@extends('layouts.app')


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@section('content')

    <form action="{{route('assignment.store')}}" method="POST">
        <div class="row pt-3">
            <div class="col-md-9">

                <div class="form-row">
                <label for="subject">Subject</label>
                <select name="subject" id="" class="form-control">
                <option value="" selected>Choose Subject</option>
                @foreach($schoolclass->subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->name}}</option>            
                @endforeach
                </select>
                </div>
                <div class="form-row pt-3">
                <label for="details"> Details</label>
                <div class="row mt-5">
                <textarea name="details" id="content" cols="30" rows="10" class="form-control"></textarea>
                </div>
                </div>


            {{--  <button type="button" class="delete-row">Delete Row</button>  --}}
            
            <input type="submit" value="Add Assignment" class="form-control btn btn-info mt-3">
        </div>
        <div class="col-md-3">
            <label for="attdate">Date</label>
            <input type="date" name="attddate" id="" class="form-control">
        </div>
        
    </form>
@endsection


@section('page-title')
    Daily Attendance {{$schoolclass->session->session}} - <a href="{{route('schoolclass.show', ['id'=> $schoolclass->id])}}">{{$schoolclass->name}}</a>
@endsection

@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
    <script>
      jQuery(document).ready(function($) {
            $('#content').summernote({
                placeholder: 'Assignment Details',
                height: 300
            });
      });
    </script>
@endsection