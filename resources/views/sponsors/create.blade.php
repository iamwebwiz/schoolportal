@extends('layouts.app')

@section('content')

            <form action="{{route('sponsors.store')}}" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                </div>
                <div class="form-group col-md-10">
                
                <label for="fullname">Full Names</label>
                <input type="text" class="form-control" id="fullname" placeholder="Full Names" name="fullName" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="address">Home Address</label>
                <textarea name="address" class="form-control" id="" cols="4" rows="4" placeholder="Home Address..."></textarea>
                </div>
            </div>    
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="occupation">Occupation</label>
                    <input type="occupation" class="form-control" placeholder="Enter Occupation...." name="occupation">
                </div>
                
                <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                
                <div class="form-group col-md-4">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
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
            <button type="submit" class="btn btn-primary btn-block">Add Sponsor Profile</button>
            </div>
            </div>
            </form>


@endsection

@section('page-title')
    Create Sponsor's Profile
@endsection