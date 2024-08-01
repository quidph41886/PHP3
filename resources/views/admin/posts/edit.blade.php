<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhật bài viết</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
{{-- Buổi 8  edit --}}

<body>
    <div class="container m-4">
        <h1 class="center">Sửa bài viết</h1>
        <a href="{{ route('post.index') }}" class="btn btn-primary">List</a>

        <form action=" {{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- thêm method: PUT --}}
            @method('PUT')
            {{-- get bootstrap5 --}}
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}"> 
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="fileImage">
                <br>
                <img id="img" src="{{ asset('/storage/' . $post->image) }}" width="60" alt="{{ $post->title }}">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" id="" rows="3" name="description">{{ $post->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea class="form-control" id="" rows="6" name="content"> {{ $post->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">View</label>
                <input type="number" name="view" class="form-control" value="{{ $post->view }}">
            </div>


            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" id="" class="form-control">

                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @if ($cate->id == $post->cate_id) selected @endif>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

    <script>
        var fileImage = document.querySelector('#fileImage')
        var img = document.querySelector('#img')

        // Thay đổi ảnh
        fileImage.addEventListener('change', function(e){
            e.preventDefault();
            img.src = URL.createObjectURL(this.files[0]);
        })
    </script>

</body>

</html>
