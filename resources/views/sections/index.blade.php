@extends('layouts.app')

    @section('content')

    @if($sections->count() > 0 )
    <div class="col-md-10">
    <div class="card">
    <div class="card-body">
    <div class="table-responsive">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Head</th>
                        <th>Students</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                      <tr>
                        <td>{{$section->name}}</td>
                        <td>{{$section->description}}</td>
                        <td>{{$section->head}}</td>
                        <td>{{$section->students->count()}}</td>
                        <td> 
                        <div class="row">
                        <a href="{{ route('sections.show', ['id' => $section->id])}}" class="btn btn-sm btn-info">Edit</a>  
                        &nbsp;
                        <form action="{{ route('sections.destroy', ['id' => $section->id])}}" method="POST">
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
    </div
    </div>
    </div>
    </div>
    <div class="col-md-2 pt-5">
    <a class="btn btn-info" data-toggle="modal" data-target="#create-section">Add Section</a>
    </div>
    @else 

    <h3>No Section added yet.</h3><br>
    <a class="btn btn-info" data-toggle="modal" data-target="#create-section">Add Section</a>

    @endif

     <div class="modal fade" id="create-section" tabindex="-1" role="dialog" aria-labelledby="create-sectionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="create-sectionModalLabel">Create Section</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                  <form action="{{route('sections.store')}}" method="post" class="form-horizontal">
                            <div class="modal-body">
                                  {{ csrf_field() }}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Enter Section name..." class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                            <div class="col-12 col-md-9"><textarea name="description" id="description" rows="4" placeholder="Description..." class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="head" class=" form-control-label">Section head</label></div>
                            <div class="col-12 col-md-9">
                            <select name="head" class="form-control" id="">
                            <option value="Select Section head"></option>
                            @foreach ($staffs as $staff)
                            <option value="{{$staff->fullName}}">{{$staff->fullName}}</option>
                            @endforeach
                            </select>
                            </div>
                          </div>
                          </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                            
                        </div>
                    </div>
                </div>
                

    @endsection


    @section('page-title')
        All Sections of the School
    @endsection