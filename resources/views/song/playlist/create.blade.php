<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="background-color: #6F323C; color: #f5deb3;">
    <div class="container-md">
        <div class="row">
            <div class="col text-center my-4">

            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-8 text-start my-4">
                <div class="card border-0 p-4" style="background-color: #7f3a45; color: #f5deb3;">
                    <h5>Buat playlist baru</h5>
                    <form action="{{ route('playlist.store') }}" method="POST">
                            @csrf   
                                                    <!-- Song Name Input -->
                        <div class="form-group my-3">
                            <label for="inputSongName1">Masukkan nama playlist</label>
                            <input type="text" class="form-control" name="name" id="inputSongName1" placeholder="Masukkan nama playlist">
                            <small class="form-text" style="color: #f5ded3;">Berikan nama playlist</small>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn sign-up" type="submit">Submit</button>
                    </form>

                        <!-- Display general error if any -->
                        @if($errors->has('error'))
                        <div class="alert alert-danger mt-3">{{ $errors->first('error') }}</div>
                        @endif

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>