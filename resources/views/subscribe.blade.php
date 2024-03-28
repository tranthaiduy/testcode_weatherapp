<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast Subscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h3 style="text-align: center;">Subscribe to Weather Forecast</h3>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="conatiner">
        <div class="row px-4">
            <div class="col-md-4 ">
                <form action="{{ route('subscribe-post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address:</label><br>
                        <input class="form-control" type="email" id="email" name="email" required><br>
                        <button class="btn btn-primary btn-block" type="submit">Subscribe</button>
                        
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form method="post" action="{{ route('unsubscribe') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address:</label><br>
                        <input class="form-control" type="email" id="email" name="email"><br>
                        <button type="submit" class="btn btn-danger btn-block">Unsubscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (session('success'))
        {{ session('success') }}
    @endif
</body>
</html>
