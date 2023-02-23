<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/specMenu.css') }}" />
    <title>Document</title>
</head>

<body>
    <form action="{{ route('importFile') }}" method="post" enctype="multipart/form-data" require>
        @csrf
        <input type="file" name="users" id="">
        <button type="submit">submit</button>
    </form>
</body>

</html>