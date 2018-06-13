@extends('layouts.app')

@section('content')

            <form action="{{route('sponsors.update', ['id' => $sponsor->id])}}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  {{method_field('PUT')}}
            <div class="form-row">
                <div class="form-group col-md-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{$sponsor->title}}">
                </div>
                <div class="form-group col-md-10">
                
                <label for="fullname">Full Names</label>
                <input type="text" class="form-control" id="fullname" placeholder="Full Names" name="fullName" value="{{$sponsor->fullName}}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="address">Home Address</label>
                <textarea name="address" class="form-control" id="" cols="4" rows="4" placeholder="Home Address...">{{$sponsor->address}}</textarea>
                </div>
            </div>    
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="occupation">Occupation</label>
                    <input type="occupation" class="form-control" placeholder="Enter Occupation...." name="occupation" value="{{$sponsor->occupation}}">
                </div>
                
                <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{$sponsor->email }}" required>
                </div>
                
                <div class="form-group col-md-4">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{$sponsor->phone}}" required>
                </div>
                
            </div>
            <div class="form-row">
            
                <div class="form-group col-md-4">
                    <label for="image">Picture</label>
                    <input type="file" class="form-control" id="image" placeholder="picture" name='image'>
                </div>
                <div class="form-group col-md-8">
                    <label for="user">User ID</label>
                    <select name="user" id="" class="form-control">
                        <option value="">Select User</option>
                    </select>
                </div>
            </div>
            <div><br></div>
            <div class="form-row">
            <div class="col-md-12 form-control">
            <button type="submit" class="btn btn-primary btn-block">Update Sponsor Profile</button>
            </div>
            </div>
            </form>


@endsection

@section('page-title')
    Update Sponsor's Profile
@endsection