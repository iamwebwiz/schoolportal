@extends('layouts.app')

@section('content')

            <form action="{{route('schoolclass.store')}}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                @include('includes.input.section')
                </div>
                <div class="form-group col-md-6">
                
                <label for="name">Class Name</label>
                <input type="text" class="form-control" id="name" placeholder="class" name="name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                @include('includes.input.session')
                </div>
                <div class="form-group col-md-6">
                @include('includes.input.teacher')
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
    Add New Class
@endsection