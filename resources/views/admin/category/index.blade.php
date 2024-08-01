<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DANH SÁCH DANH MỤC</title>
</head>

<body>
    <h1>DANH MỤC</h1>
    <table border="1">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>
                <a href="#">Thêm mới</a>
            </th>
        </tr>

        @foreach ($categories as $cate)
            {{-- categories lấy từ View --}}

            <tr>
                <td>{{ $cate->id }}</td>
                <td>{{ $cate->name }}</td>

                <td>
                    Edit
                    Delete
                </td>

            </tr>
        @endforeach
    </table>

</body>

</html>
