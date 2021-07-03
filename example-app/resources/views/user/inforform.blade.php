<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="container">
    <form action="{{route('user.inforform')}}" method="get">
        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="hvt">
        </div>
        <div class="mb-3">
            <label class="form-label">Tuổi</label>
            <input type="text" class="form-control" name="age">
        </div>
        <div class="mb-3">
            <label class="form-label">giới tính</label> <br>
            <input type="radio" name="gt" value="1">
            <label>nam</label><br>
            <input type="radio" name="gt" value="2">
            <label>nữ</label><br>
            <input type="radio" name="gt" value="3">
            <label>khác</label>
        </div>
        <div class="mb-3">
            <label class="form-label">Tình trạng hôn nhân</label>
            <input type="checkbox" name="kh" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>