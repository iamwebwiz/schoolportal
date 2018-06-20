@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
        <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p>Section :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$schoolclass->section->name}} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Session :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$schoolclass->session->session}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <p>Class :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p>{{$schoolclass->name}}</p>
                </div>
            </div>
             <div class="row">
                <div class="col-md-4">
                    <p>Teacher(s) :</p>
                </div>
                <div class="col-md-8 detail-display">
                    <p> @foreach($schoolclass->staff as $staff)
                        <a href="{{route('staff.show', ['id'=>$staff->id])}}">{{$staff->fullName}}</a>
                        @endforeach</p>
                </div>
            </div>
             
      
        </div>
        </div>


        
        <div class="card">
                                <div class="card-header">
                                    <h4>Details Tab</h4>
                                </div>
                                <div class="card-body">
                                    <div class="default-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Students</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="table-responsive">
                                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>picture</th>
                                                                <th>Name</th>
                                                                <th>Gender</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                                @foreach($schoolclass->students as $student)
                                                                    <tr class='clickable-row' data-href="{{ route('students.show', ['id' => $student->id])}}">
                                                                        <td>
                                                                        @if ($student->image)
                                                                        <img src="{{$student->image}}" alt="{{$student->fullName}}" width="100px">               
                                                                        @else
                                                                        <img src="{{asset('images/avatar.png')}}" alt="{{$student->fullName}}" width="100px">  
                                                                        @endif
                                                                        </td>
                                                                        <td>{{$student->fullName}}</td>
                                                                        <td>{{$student->gender}}</td>
                                                                        
                                                                        <td> 
                                                                        <div class="row">
                                                                        &nbsp;&nbsp;
                                                                        <a href="{{ route('students.edit', ['id' => $student->id])}}" class="btn btn-sm btn-info">Edit</a>  
                                                                        &nbsp;
                                                                        <form action="" method="POST">
                                                                        {{ csrf_field()}}
                                                                        {{ method_field('DELETE')}}
                                                                        <button type="submit" class="btn btn-danger btn-sm">Remove from class</button>
                                                                        
                                                                        </form>
                                                                        </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <p>Raw denim you probably have heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .</p>
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <p>Raw denim you probably have heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex sd. Alip placeat salvia cillum iphone. Seitan alip s cardigan american apparel, butcher voluptate nisi .</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
        </div>
        <div class="col-md-4">
         <div class="card">
            <div class="card-header">
                <p>Add Details</p>   
            </div>  
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">No of Students</div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addstudents', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Students</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">No of Subjects</div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addsubjects', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Subjects</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">No of Books</div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-info btn-sm">Add Books</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">No of Tests</div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-info btn-sm">Add Tests</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">No of Exams</div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-info btn-sm">Add Exam</a>
                    </div>
                </div>
            </div>              
        </div>
    </div>

@endsection


@section('page-title')
    Class Details - {{$schoolclass->section->name}} - {{$schoolclass->name}}
@endsection