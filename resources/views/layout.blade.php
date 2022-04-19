<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animes Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dccdc6df75.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="mt-4 p-5 bg-info text-white rounded mb-4">
            <h1 class="d-flex justify-content-center">@yield('title')</h1>
        </div>

        @yield('content')
    </div>
</body>
</html>