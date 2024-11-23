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
                    <h5>Upload Lagu Anda</h5>
                    <form action="{{ route('song.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf

                        <!-- Song Name Input -->
                        <div class="form-group my-3">
                            <label for="inputSongName1">Masukkan nama lagu</label>
                            <input type="text" class="form-control" name="name" id="inputSongName1" placeholder="Masukkan nama lagu">
                            <small class="form-text" style="color: #f5ded3;">Berikan nama pada lagu yang akan anda upload</small>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Genre Dropdown -->
                        <div class="form-group my-3">
                            <label for="genre">Tambahkan Genre Lagu Anda</label>
                            <select class="form-control form-control-sm" name="genre">
                                @forelse($genres as $genre)
                                    <option value="{{ $genre->name }}">{{ $genre->name }}</option>
                                @empty
                                    <option value="">No genre found</option>
                                @endforelse
                            </select>   
                            @error('genre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Song File Input -->
                        <div class="form-group my-3">
                            <label for="formFile" class="form-label">Tambahkan Lagu Anda</label>
                            <input class="form-control" type="file" name="song" id="formFile" accept="audio/mpeg">
                            @error('song')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Album Name Input (Optional) -->
                        <div class="form-group my-3">
                            <label for="inputAlbumName">Masukkan nama album</label>
                            <input type="text" class="form-control" name="album" id="inputAlbumName" placeholder="Masukkan nama album">
                            <small class="form-text" style="color: #f5ded3;">Masukkan lagu anda ke album baru</small>
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