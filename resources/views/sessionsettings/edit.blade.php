@extends('layouts.app')

@section('content')

<form action="{{route('sessions.update', ['id'=>$session->id])}}" method="post" enctype="multipart/form-data">
                           
                            <div class="modal-body">
                                        {{ csrf_field() }}
                                        {{method_field('PUT')}}
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                  <label for="session">School Session</label>
                                  <input type="text" class="form-control" id="session" 
                                  value="{{$session->session}}" name="session">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-12">
                                  
                                  <label for="session_details">Session Details</label>
                                  <textarea name="session_details" id="" cols="4" rows="10" class="form-control">{{$session->session_details}}</textarea>
                                  </div>
                              </div>  
                              <div class="form-row">
                                  <div class="col-md-12 form-control">
                              <button type="submit" class="btn btn-primary btn-block">Update Session</button>
                                  </div>
                              </div>
                            </div>
                </form>


@endsection

@section('page-title')
    Edit {{$session->session} Session
@endsection