@extends('layouts.app')

@section('content')


 @if($sponsors->count() > 0 )
    <div class="card">
    <div class="card-body">
    <div class="table-responsive">
    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Occupation</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($sponsors as $sponsors)
                      <tr class='clickable-row' data-href="{{ route('sponsors.show', ['id' => $sponsors->id])}}">
                        <td>
                        @if ($sponsors->image)
                        <img src="{{$sponsors->image}}" alt="{{$sponsors->fullName}}" width="100px">               
                        @else
                        <img src="{{asset('images/avatar.png')}}" alt="{{$sponsors->fullName}}" width="100px">  
                        @endif
                         </td>
                        <td>{{$sponsors->title}}</td>
                        <td>{{$sponsors->fullName}}</td>
                        <td>{{$sponsors->email}}</td>
                        <td>{{$sponsors->phone}}</td>
                        <td>{{$sponsors->occupation}}</td>
                        
                        <td> 
                        <div class="row">
                        &nbsp;&nbsp;
                        <a href="{{ route('sponsors.edit', ['id' => $sponsors->id])}}" class="btn btn-sm btn-info">Edit</a>  
                        &nbsp;
                        <form action="{{ route('sponsors.destroy', ['id' => $sponsors->id])}}" method="POST">
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
    </div>
    </div>
    </div>

    @else 

    <h3>No sponsors added yet.</h3><br>
    <a class="btn btn-info" href="{{route('sponsors.create')}}">Add sponsors</a>

    @endif


@endsection

@section('page-title')

    All sponsors
@endsection