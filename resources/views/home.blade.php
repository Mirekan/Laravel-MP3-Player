@extends('layouts.app')

@section('content')

<style>
    .hover:hover {
        background-color: #6f323c6e;
        border-radius: 8px;
    }

</style>

<div class="container-fluid base">
        <!-- main content section -->
        <div class="row gap-3">
        <div class="col-3 side-bar rounded ms-3" style="background-color: #7f3a45; min-height: 77vh;" >
            <div class="d-flex align-items-center justify-content-between">
                <a href="#" class="d-flex align-items-center text-decoration-none">
                    <i class="bi bi-music-note-list me-2"></i> <!-- Add margin to the right -->
                    <p class="mb-0">Koleksi sampeyan</p> <!-- Remove bottom margin -->
                </a>
                @if (Auth::guest())

                @else
                <div class="dropdown">
                    <button class="btn btn-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: wheat; font-size: 40px;">
                        + <!-- Only show +, no dropdown icon -->
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item " href="{{ route('playlist.create') }}">Buat Playlist</a></li>
                    </ul>
                </div>
                @endif
            </div>
            <div class="mt-1 mb-3">
                <button class="btn btn-outline-light me-2 rounded-pill btn-sm" id="playlistButton" type="button">Playlist</button>
                <button class="btn btn-outline-light me-2 rounded-pill btn-sm" id="artistButton" type="button">Artist</button>
            </div>
            <!-- <div class="d-flex align-items-center"> -->
                <!-- Search icon in <a> tag -->
                <!-- <a href="javascript:void(0);" id="toggleSearchBar">
                    <i class="bi bi-search"></i>
                </a> -->

                <!-- Search bar (initially hidden with 0 width) -->
                <!-- <input class="form-control search-bar ms-2" id="searchBar" type="search" placeholder="Cari playlist anda" aria-label="Search" style="width: 0; visibility: hidden;">
            </div> -->
            @if (Auth::guest())
            <div>
                <p>Buat playlist pertamamu</p>
                <p>Caranya mudah, dengan klik tombol di bawah ini</p>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#playlistModal">
  Buat Playlist
</button>

<!-- The Modal -->

<div class="modal fade" id="playlistModal" tabindex="-1" aria-labelledby="playlistModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark" style="color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="playlistModalLabel">Buat playlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Masuk untuk membuat dan bagikan playlist.
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nanti</button>
        <form action="{{ route('login') }}" method="get">
            <button type="submit" class="btn btn-light">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>
            </div>
            @elseif (Auth::user()->role === 'artist')
            @else
            <div class="gap-2">
                <a href="#" class="d-flex align-items-center text-decoration-none">
                        <div class="container">
                @forelse($playlists as $playlist)
                            <div class="row">
                                <label for="">{{ $playlist->name }}</label>
                            </div>
                @empty
                    <p>Tidak ada Playlist</p>
                @endforelse
                        </div>
                </a>


            </div>
            @endif
        </div>
                <!-- Main Content Section -->
                <div class="col-8 main rounded py-3" style="background-color: #7f3a45;">
                    <div class="row">
                        <div class="col-3 ms-5 text-center">
                            <div class="">
                                <h5>#</h5>
                            </div>
                        </div>
                        
                        <div class="col-3 ms-2">
                            <div class="ps-5">
                                <h6>Title</h6>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="ps-4">
                                <h6>Album</h6>
                            </div>
                        </div>

                    </div>
                    <ul>
                        @forelse($songs as $index => $song)
                            <div class="row row-hover"  onclick="playSong({{ $index }})">
                                <div class="col-1 mx-auto  py-2">
                                    <label for="">{{$song->id}}</label>
                                </div>

                                <div class="col-8 p-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">{{ $song->name }}</label>
                                        </div>

                                        <div class="col-4">
                                            <label for="">No Album</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <li>No songs found.</li>
                        @endforelse
                    </ul>
                </div>
        </div>


        <!-- Custom Audio Player Section -->
        <div class="container text-center d-flex justify-content-center" id="audioCard">
        <div class="row ">
            <div class="col">
                <button id="playPauseBtn" class="btn btn-light">
                    <i class="bi bi-play-fill"></i>
                </button>
            </div>
            <div class="col">
            <div id="playerControls" class="controls my-3">
                    <progress id="progressBar" value="0" max="100" style="width: 79vh"></progress>
            </div>
            </div>
            <div class="col">
            <button id="muteBtn" class="btn btn-light"><i class="bi bi-volume-mute-fill"></i></button>
            </div>
            <div class="col d-flex">
            <p id="currentTime" class="mx-2" >0:00</p> 
            <p id="durationTime" >0:00</p>

            </div>
            <audio id="audioPlayer" class="audio-element" style="display: none;">
                <source id="audioSource" src="" type="audio/mpeg">
            </audio>
        </div>
        </div>



    
    </div>
</div>

<script>
    const songs = @json($songs);
    
    // Get the elements
    const audioPlayer = document.getElementById('audioPlayer');
    const audioSource = document.getElementById('audioSource');
    const audioCard = document.getElementById('audioCard');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const progressBar = document.getElementById('progressBar');
    const currentTimeDisplay = document.getElementById('currentTime');
    const durationTimeDisplay = document.getElementById('durationTime');
    const muteBtn = document.getElementById('muteBtn');
    const playIcon = playPauseBtn.querySelector('i'); 
   
    let isPlaying = false;
    let isMuted = false;
    let currentSongIndex = -1;

    // Function to play a song
    function playSong(index) {
        // Show the custom audio player controls
        audioCard.style.display = 'block';

        // Update the audio source and start the audio
        if (currentSongIndex !== index) {
            currentSongIndex = index;
            audioSource.src = songs[index].file_path;
            audioPlayer.load();  // Reload the player with the new song
        }

        // Play or Pause the song
        if (!isPlaying) {
            audioPlayer.play();
            playPauseBtn.classList.remove('bi-play-fill');
            playPauseBtn.classList.remove('bi-pause-fill');
            playPauseBtn.classList.add('bi-pause-fil');  
            isPlaying = true;
        } else {
            audioPlayer.pause();
            playPauseBtn.classList.remove('bi-pause-fill');
            playPauseBtn.classList.remove('bi-play-fill');  
            playPauseBtn.classList.add('bi-play-fill');  
            isPlaying = false;
        }

        // Update the duration time when the audio metadata is loaded
        audioPlayer.onloadedmetadata = function() {
            durationTimeDisplay.textContent = formatTime(audioPlayer.duration);
        }

        // Update progress bar as the audio plays
        audioPlayer.ontimeupdate = function() {
            const progress = (audioPlayer.currentTime / audioPlayer.duration) * 100;
            progressBar.value = progress;
            currentTimeDisplay.textContent = formatTime(audioPlayer.currentTime);
        };
    }

    // Play/Pause button toggle
    playPauseBtn.addEventListener('click', function() {
        if (isPlaying) {
            audioPlayer.pause();
            playPauseBtn.textContent = 'Play';
            isPlaying = false;
        } else {
            audioPlayer.play();
            playPauseBtn.textContent = 'Pause';
            isPlaying = true;
        }
    });

    // Mute/Unmute button
    muteBtn.addEventListener('click', function() {
        if (isMuted) {
            audioPlayer.muted = false;
            muteBtn.textContent = 'Mute';
            isMuted = false;
        } else {
            audioPlayer.muted = true;
            muteBtn.textContent = 'Unmute';
            isMuted = true;
        }
    });

    // Format time function to display time as minutes:seconds
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const remainingSeconds = Math.floor(seconds % 60);
        return `${minutes}:${remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds}`;
    }
</script>
@endsection
