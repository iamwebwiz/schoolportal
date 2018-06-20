@extends('layouts.app')

    @section('content')

    
    <div class="col-md-10">
    <div class="card">
    <div class="card-body">
    
                                  <form action="{{ route('sections.update', ['id' => $section->id])}}" method="post" class="form-horizontal">
                                  {{ csrf_field() }}
                                  {{ method_field('PUT') }}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Section name..." class="form-control" value="{{$section->name}}"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-9"><textarea name="description" id="description" rows="4" placeholder="Description..." class="form-control">{{$section->description}}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="head" class=" form-control-label">Section head</label></div>
                            <div class="col-12 col-md-9">
                            <select name="head" class="form-control" id="">
                            <option value="Select Section head"></option>
                            @if($section->head)
                            <option value="{{$section->head}}" selected>{{$section->head}}</option>
                            @else
                            <option value="">Choose Section head</option>
                            @endif
                            @foreach ($staffs as $staff)
                            <option value="{{$staff->fullName}}">{{$staff->fullName}}</option>
                            @endforeach
                            </select></div>
                          </div>
                          </div>
                                <button type="submit" class="btn btn-primary">Edit</button>
                        
                        </form>
    </div>
    </div>
    </div>
    <div class="col-md-2 card">
    <div class="card-body">
    <a class="btn btn-info" href="{{route('sections.index')}}">All Section</a>
    </div>
    </div>

  

    @endsection


    @section('page-title')
        Edit Section - {{$section->name}}
    @endsection