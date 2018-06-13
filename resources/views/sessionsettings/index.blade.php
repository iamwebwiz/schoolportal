@extends('layouts.app')

@section('content')


 @if($sessionsettings->count() > 0 )
    <div class="row">
      <div class="card col-md-9">
        <div class="card-body">
          <div class="table-responsive">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Session</th>
                                <th>Session Details</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($sessionsettings as $sessionsetting)
                              <tr class='clickable-row' data-href="{{ route('sessions.show', ['id' => $sessionsetting->id])}}">
                                <td>{{$sessionsetting->session}}
                                </td>
                                <td>{{$sessionsetting->session_details}}</td>
                              <td>
                                <div class="row">
                                &nbsp;&nbsp;
                                <a href="{{ route('sessions.edit', ['id' => $sessionsetting->id])}}" class="btn btn-sm btn-info">Edit</a>  
                                &nbsp;
                                <form action="{{ route('sessions.destroy', ['id' => $sessionsetting->id])}}" method="POST">
                                {{ csrf_field()}}
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </td>
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
      <div class="col-md-3">
            <button class="btn btn-info btn-block mt-3" data-toggle="modal" data-target="#create-session">Add Session</button>

      </div>
    </div>

    @else 

    <h3>No Session added yet.</h3><br>
    <a class="btn btn-info" data-toggle="modal" data-target="#create-session">Add Session</a>

@endif





 <div class="modal fade" id="create-session" tabindex="-1" role="dialog" aria-labelledby="create-sessionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="create-sessionModalLabel">Add Session</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                           <form action="{{route('sessions.store')}}" method="post" enctype="multipart/form-data">
                           
                            <div class="modal-body">
                                        {{ csrf_field() }}
                              <div class="form-row">
                                  <div class="form-group col-md-6">
                                  <label for="session">School Session</label>
                                  <input type="text" class="form-control" id="session" placeholder="Academic Session" name="session">
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-md-12">
                                  
                                  <label for="session_details">Session Details</label>
                                  <textarea name="session_details" id="" cols="4" rows="10" class="form-control"></textarea>
                                  </div>
                              </div>  
                              <div class="form-row">
                                  <div class="col-md-12 form-control">
                              <button type="submit" class="btn btn-primary btn-block">Add Session</button>
                                  </div>
                              </div>
                            </div>
                </form>
                            
                        </div>
                    </div>
                </div>
@endsection

@section('page-title')

    All Sessions
@endsection