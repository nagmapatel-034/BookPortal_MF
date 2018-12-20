@extends('layout.app')

@section('content')
@include('inc.header')
<?php use App\book_author; ?>
<!-- Dispay recorded database--> 
<br><br>
<div class="container">
        @if(isset($details))
        <h2>Search Results for <b> {{ $query }} </b> ...</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Book Name</th>
              <th>ISBN</th>
              <th>Location</th>
              <th>Status</th>
              <th>Unit Available</th>
            </tr>
          </thead>
          <tbody>

            @foreach($details as $items)
            <tr>
              <td>{{$items->book_id}}</td>
              <td><a href='/bookCategory/book/{{$items->book_id}}'>{{$items->book_title}}</a></td>
              <td>{{$items->book_isbn}}</td>
              <td>{{$items->book_location}}</td>
              <td>{{$items->book_status}}</td>
              <td>{{$items->book_unit}}</td>
  
            </tr>
            @endforeach
          </tbody>
        </table>
        <center> {{ $details->links() }} </center>

        @elseif(isset($message))
          <p>{{ $message }}</p>
        @endif

      </div>

      @include('inc.footer')
@endsection
