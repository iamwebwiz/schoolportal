@extends('layouts.app')

@section('content')


 @if($users->count() > 0 )
    <div class="row">
      <div class="card col-md-10">
        <div class="card-body">
          <div class="table-responsive">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Priviledge</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                              <tr>
                                <td>{{$user->name}}
                                </td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                <div class="row">
                                <div class="col-md-6">
                                <form action="{{ route('users.update', ['id' => $user->id])}}" method="post">
                                  {{ csrf_field() }}
                                  {{method_field('PUT')}}
                                <select name="priviledge" id="" class="form-control">
                                @if($user->priviledge)
                                <option value="{{$user->priviledge}}" selected>{{$user->priviledge}}</option>
                                @else
                                <option value="" selected>Set Priviledge</option>
                                @endif
                                <option value="account">Account</option>
                                <option value="admin">Admin</option>
                                <option value="parent">Parent</option>
                                <option value="staff">Staff</option>
                                <option value="invalid">Invalid</option>
                                </select>
                                </div>
                                <div class="col-md-6">
                                <button type="submit" class="btn btn-info btn-sm">Change <br> Priviledge</button>
                                </div>
                                
                                </form>
                                </div>
                                </td>
                              <td>
                                <div class="row">
                               
                                <form action="{{ route('users.destroy', ['id' => $user->id])}}" method="POST">
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
      <div class="col-md-2">
            

      </div>
    </div>

    @else 

    <h3>No User added yet.</h3><br>

@endif





 
                </div>
@endsection

@section('page-title')

    All Sessions
@endsection