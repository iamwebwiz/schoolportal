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
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Subjects</a>
                                                <a class="nav-item nav-link" id="nav-books-tab" data-toggle="tab" href="#nav-books" role="tab" aria-controls="nav-books" aria-selected="false">Books</a>
                                                <a class="nav-item nav-link" id="nav-attendance-tab" data-toggle="tab" href="#nav-attendance" role="tab" aria-controls="nav-attendance" aria-selected="false">Attendance</a>
                                                <a class="nav-item nav-link" id="nav-assignments-tab" data-toggle="tab" href="#nav-assignments" role="tab" aria-controls="nav-assignments" aria-selected="false">Assignments</a>
                                                <a class="nav-item nav-link" id="nav-tests-tab" data-toggle="tab" href="#nav-tests" role="tab" aria-controls="nav-tests" aria-selected="false">Tests</a>
                                                <a class="nav-item nav-link" id="nav-exams-tab" data-toggle="tab" href="#nav-exams" role="tab" aria-controls="nav-exams" aria-selected="false">Exams</a>
                                                <a class="nav-item nav-link" id="nav-stdrep-tab" data-toggle="tab" href="#nav-stdrep" role="tab" aria-controls="nav-stdrep" aria-selected="false">Student Report</a>
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
                                                                        <form action="{{ route('schoolclass.removestudent', ['id' => $schoolclass->id])}}" method="POST">
                                                                        {{ csrf_field()}}
                                                                        {{ method_field('DELETE')}}
                                                                        
                                                                            <input type="hidden" name="student" value="{{$student->id}}">
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
                                            
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>Teacher</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach($schoolclass->subjects as $subject)
                                                                <tr>
                                                                    <td>
                                                                    {{$subject->name}}
                                                                    </td>
                                                                    <td>
                                                                    @foreach($subject->staff as $staff)
                                                                    {{$staff->fullName}}
                                                                    @endforeach
                                                                    </td>
                                                                    <td>
                                                                    <form action="{{ route('subjects.destroy', ['id' => $subject->id])}}" method="POST">
                                                                        {{ csrf_field()}}
                                                                        {{ method_field('DELETE')}}
                                                                        
                                                                        <button type="submit" class="btn btn-danger btn-xs">Remove</button>
                                                                        
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="tab-pane fade" id="nav-books" role="tabpanel" aria-labelledby="nav-books-tab">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Book Name</th>
                                                            <th>Author</th>
                                                            <th>Price</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach($schoolclass->books as $book)
                                                                <tr>
                                                                    <td>
                                                                    {{$book->book}}
                                                                    </td>
                                                                    <td>
                                                                    {{$book->author}}
                                                                    </td>
                                                                    <td>
                                                                    {{$book->price}}
                                                                    </td>
                                                                    <td>
                                                                    <form action="{{ route('books.destroy', ['id' => $book->id])}}" method="POST">
                                                                        {{ csrf_field()}}
                                                                        {{ method_field('DELETE')}}
                                                                        
                                                                        <button type="submit" class="btn btn-danger btn-xs">Remove</button>
                                                                        
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            <div class="tab-pane fade" id="nav-attendance" role="tabpanel" aria-labelledby="nav-attendance-tab">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Attendance</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            {{--  @foreach($schoolclass->books as $book)
                                                                <tr>
                                                                    <td>
                                                                    {{$book->book}}
                                                                    </td>
                                                                    <td>
                                                                    {{$book->author}}
                                                                    </td>
                                                                    <td>
                                                                    {{$book->price}}
                                                                    </td>
                                                                    <td>
                                                                    <form action="{{ route('books.destroy', ['id' => $book->id])}}" method="POST">
                                                                        {{ csrf_field()}}
                                                                        {{ method_field('DELETE')}}
                                                                        
                                                                        <button type="submit" class="btn btn-danger btn-xs">Remove</button>
                                                                        
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach  --}}
                                                    </tbody>
                                                </table>

                                            </div>                                            
                                            <div class="tab-pane fade" id="nav-assignments" role="tabpanel" aria-labelledby="nav-assignments-tab">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Subject</th>
                                                            <th>Details</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            {{--  @foreach($schoolclass->books as $book)
                                                                <tr>
                                                                    <td>
                                                                    {{$book->book}}
                                                                    </td>
                                                                    <td>
                                                                    {{$book->author}}
                                                                    </td>
                                                                    <td>
                                                                    {{$book->price}}
                                                                    </td>
                                                                    <td>
                                                                    <form action="{{ route('books.destroy', ['id' => $book->id])}}" method="POST">
                                                                        {{ csrf_field()}}
                                                                        {{ method_field('DELETE')}}
                                                                        
                                                                        <button type="submit" class="btn btn-danger btn-xs">Remove</button>
                                                                        
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach  --}}
                                                    </tbody>
                                                </table>

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
                    <div class="col-md-6"><i> <strong>{{count($schoolclass->students)}} </strong> Students</i></div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addstudents', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Students</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6"><i> <strong>{{count($schoolclass->subjects)}}  </strong> Subjects</i></div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addsubjects', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Subjects</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6"><i> <strong>{{count($schoolclass->books)}}  </strong> Books</i></div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addbooks', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Books</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6"><i> Attendance</i></div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addattendance', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Attendance</a>
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-md-6"><i> <strong>{{count($schoolclass->assignments)}}  </strong> Assignments</i></div>
                    <div class="col-md-6">
                        <a href="{{route('schoolclass.addassignment', ['id' => $schoolclass->id ])}}" class="btn btn-info btn-sm">Add Assignment</a>
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
    Class Details - {{$schoolclass->session->session}} - {{$schoolclass->name}}
@endsection