@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-6">
                <form action="{{route('sessionsettings.store')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="session">School Session</label>
                        <input type="text" class="form-control" id="session" placeholder="School Section" name="section">
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
                </form>
            </div>
            <div class="col-md-6">
                @foreach($sessionsettings as $sessionsetting)
                    <table class="table table-stripped">
                    <th></th>
                    </table>

                @endforeach
            </div>
        </div>


@endsection

@section('page-title')
    Add New Session
@endsection