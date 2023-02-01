<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All images</h1>

    @foreach ($images as $image)

    <div>
        <a href="">
            <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}"
            width="300">
        </a>
    </div>
        
    @endforeach
</body>
</html>