<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="demo_name" placeholder="enter name">
            <input type="password" name="demo_password" placeholder="enter password">
            <button type="submit">submit</button>
        </form>
    </div>
</body>
</html>
