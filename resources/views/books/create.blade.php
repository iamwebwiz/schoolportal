@extends('layouts.app')

@section('content')

            <form action="{{route('staff.store')}}" method="post" enctype="multipart/form-data">
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
                <label for="user">User</label>
                <select id="user" class="form-control" name="user">
                    <option selected value="0">Choose User...</option>
                </select>
                </div>
            </div>    
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select id="gender" class="form-control" name="gender">
                        <option selected>Choose...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                    <label for="address">Address</label>
                    <input type="address" class="form-control" id="address" placeholder="1234 Main St" name="address">
                </div>
            </div>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                
                <div class="form-group col-md-4">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="form-group col-md-4">
                <label for="image">Picture</label>
                <input type="file" class="form-control" id="image" placeholder="picture" name='image'>
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="dateOfBirth">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" placeholder="Date of Birth" name="dateOfBirth">
                </div>
                <div class="form-group col-md-4">
                <label for="staffType">Staff Type</label>
                <select id="staffType" class="form-control" name="staffType" required>
                    <option selected>Choose...</option>
                    <option value="admin">Admin</option>
                    <option value="account">Account</option>
                    <option value="staff">Staff</option>
                </select>
                </div>
                <div class="form-group col-md-4">
                <label for="status">Staff Status</label>
                <select id="status" class="form-control" name="status">
                    <option selected value="active">Active</option>
                    <option value="resigned">Resigned</option>
                    <option value="retired">Retired</option>
                    <option value="relieved">Relieved</option>
                </select>
                </div>
            </div>
            <div class="form-row">
             <div class="form-group col-md-3">
                <label for="dateOfEmployment">Date Employed</label>
                <input type="date" class="form-control" id="dateOfEmployment" name="dateOfEmployment" placeholder="Date of Employment">
                </div>
                <div class="form-group col-md-6">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" placeholder="Staff Job Title">
                </div>
                <div class="form-group col-md-3">
                <label for="section">Section</label>
                @foreach($sections as $section)
                <div class="checkbox">
                <label> <input type="checkbox" name="sections[]" value="{{$section->id}}"> &nbsp;  {{$section->name}} </label>
                </div>
                @endforeach
                </div>
            </div>
            <div class="form-group">
                <label for="qualifications">Qualifications</label>
                <textarea name="qualifications" id="" cols="30" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-row">
            <div class="col-md-12 form-control">
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </div>
            </div>
            </form>


@endsection

@section('page-title')
    Create Staff Profile
@endsection