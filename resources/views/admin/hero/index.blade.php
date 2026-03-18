@extends('admin.layout.app')

@section('content')

<div class="content">

<h1>Heroes</h1>
<p>Manage your Heroes</p>

@if(session('success'))
<div class="success-message">
    {{ session('success') }}
</div>
@endif

<div class="table-container">

<table class="category-table">

<thead>
<tr>
<th>ID</th>
<th>Image</th>
<th>Title</th>
<th>Message</th>
<th>Discount</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($heroes as $hero)

<tr>
<td>{{ $hero->id }}</td>

<td>
<img src="{{ asset('storage/album/'.$hero->image) }}" class="cat-img">
</td>

<td>{{ $hero->title }}</td>
<td>{{ $hero->message}}</td>
<td>{{ $hero->discount }}</td>

<td class="actions">

<a href="{{route('get.edit.hero',$hero->id)}}" class="edit-btn">Edit</a>


<button class="delete-btn">Delete</button>
</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection