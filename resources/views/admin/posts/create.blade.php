<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm bài viết</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
{{-- Buổi 8 --}}

<body>
    <div class="container m-4">
        <h1 class="center">Thêm mới bài viết</h1>
        <a href="{{ route('post.index') }}" class="btn btn-primary">List</a>

        <form action=" {{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- get bootstrap5 --}}
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" id="" rows="3" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea class="form-control" id="" rows="6" name="content"></textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">View</label>
                <input type="number" name="view" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" id="" class="form-control">

                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>

        </form>
    </div>

</body>

</html>
