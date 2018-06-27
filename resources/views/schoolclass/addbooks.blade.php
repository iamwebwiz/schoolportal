@extends('layouts.app')


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
@section('content')
    <div class="row pt-3">
        <div class="col-md-10">

        <form>
        <div class="row">
        <div class="col-md-6">
        <input type="text" id="name" placeholder="Book Name" class="form-control">
        </div>
        {{--  <input type="text" id="staff" placeholder="Email Address" name="staff">  --}}
        
        <div class="col-md-4">
        <input type="text" class="form-control" name="" id="author" placeholder="Author">
        </div>
        
        <div class="col-md-2">
        <input type="text" class="form-control" name="" id="price" placeholder="Price">
        </div>
        </div>
    </form>
    <form action="{{route('books.store')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" placeholder="class" name="schoolclass_id" value="{{$schoolclass->id}}">
        <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Select </br>(to remove)</th>
                <th>Book</th>
                <th>Author</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>

            </tr>
        </tbody>
    </table>
    
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-danger btn-xs" id="delete-row">Remove Row</a>        
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-info" >Add Books</button>
            </div>
        </div>
    </form>
    {{--  <button type="button" class="delete-row">Delete Row</button>  --}}
    

    </div>
    <div class="col-md-2">
    
    	{{--  <input type="button" class="add-row" value="Add Row">  --}}
        <a class="btn btn-info btn-xs" id="add-row">Add Row</a>
    </div>
@endsection


@section('page-title')
    Add books to {{$schoolclass->session->session}} - {{$schoolclass->name}}
@endsection



    
@section('scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $("#add-row").click(function(){
            var name = $("#name").val();
            var author = $("#author").val();
            var price = $("#price").val();
            var markup = "<tr><td><input type='checkbox' name='record'></td><td><input name='books[]' class='form-control' readonly value='" + name + "'></td><td><input name='authors[]' class='form-control' readonly value='" + author + "'></td><td><input name='price[]' class='form-control' readonly value='" + price + "'></td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $("#delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });
    });    
    </script>
@endsection