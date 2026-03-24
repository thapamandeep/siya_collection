@extends('admin.layout.app')

@section('content')

<div class="content">

<h1>Categories</h1>
<p>Manage your product categories</p>

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
<th>Name</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($categories as $category)

<tr>
<td>{{ $category->id }}</td>

<td>
<img src="{{ asset('storage/album/'.$category->image) }}" class="cat-img">
</td>

<td>{{ $category->name }}</td>

<td class="actions">

<a href="{{route('get.edit.category',$category->id)}}" class="edit-btn">Edit</a>

<a href="{{route('get.delete.category',$category->id)}}">button class="delete-btn">Delete</button></a>
</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection