<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Demo boostrap!</h1> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <table class="table">
        <h1 class="">Danh sách</h1>

        {{-- buoi10  --}}
        {{-- Hiển thị tài khoản --}}
        @auth
            <div>
                Fullname:: {{ Auth::user()->fullname }}
                <a href="{{ route('logout') }}"> Logout </a>
            </div>
        @endauth
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">View</th>
                    <th scope="col">cate</th>

                    {{-- Buổi 8 --}}
                    <th scope="col">
                        <a href="{{ route('post.create') }}" class="btn btn-primary">Thêm mới</a>

                    </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>

                        {{-- Buổi 8 hiển thị ảnh  --}}
                        <td> <img src="{{ asset('/storage/' . $post->image) }}" alt="" width="50"></td>

                        <td>{{ $post->description }}</td>
                        <td>{{ $post->view }}</td>

                        {{-- Buổi 8 --}}
                        <td>{{ $post->category->name }}</td>
                        <td class="d-flex grap-2">
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-primary">Edit</a>

                            <form action=" {{ route('post.destroy', $post) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm ('Bạn có muốn xóa không ?')" type="submit"
                                    class="btn btn-danger"> Delete </button>

                            </form>
                        </td>



                        {{-- <td>{{ $post->cate_id }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
</body>

</html>
