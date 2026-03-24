@extends('admin.layout.app')

@section('content')

<div class="container py-4">

    

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-card">

        <table class="custom-table">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($abouts as $about)
                    <tr>
                        <td>{{ $about->id }}</td>

                        <td class="title">
                            {{ $about->title }}
                        </td>

                        <td class="desc">
                            {{ \Illuminate\Support\Str::limit($about->description, 60) }}
                        </td>

                        <td>
                            @if($about->image)
                                <img src="{{ asset('storage/photos/'.$about->image) }}" class="table-img">
                            @else
                                <span class="no-img">No Image</span>
                            @endif
                        </td>

                        <td>
                            <div class="action-btns">

                                <a href="{{ route('get.edit.about', $about->id) }}" 
                                   class="btn-edit">
                                    Edit
                                </a>

                                <button class="btn-delete"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>

                            </div>
                        </td>
                    </tr>

              
                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection