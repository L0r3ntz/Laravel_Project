<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    @extends('template')
    @section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Blog Sederhana</h2>
            </div>
            <div class="float-right">
                <a href="{{route('posts.create')}}" class="btn-success">Create Post</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Title</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td class="tetx-center">{{++$i}}</td>
            <td>{{$post->title}}</td>
            <td class="text-center">
                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?)">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endsection
</body>

</html>