<nav class="navbar navbar-expand-lg" style="background-color: #6F323C;" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="fw-bold fs-4 me-auto"  href="">Muzz</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="d-flex mx-auto">
              <form action="{{ route('song.index') }}" method="GET" >
                @csrf
                <div class="input-group">
                  <span class="input-group-text border-danger-subtle border-0" style="background-color: #974B57; border-radius: 25px 0px 0px 25px;" >
                    <i class="fas fa-search"></i>
                  </span>
                  <input type="text" name="name" class="form-control border-danger-subtle border-0 search-bar" value="{{ $search }}" placeholder="Search" aria-describedby="basic-addon1"  style="background-color: #974B57; border-radius: 0px 25px 25px 0px;  min-width: 60dvh;">
                </div>
              </form>
            </div>

            <div class="d-flex">  
              @if (Auth::guest())
                <a href="{{ url('/register') }}" class="btn">Daftar</a>
                <a href="{{ url('/login') }}" class="btn sign-up me-2 rounded-pill">Masuk</a>
              @else

              <div class="btn-group d-flex">
                  <button type="button" class="btn sign-up dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $user->name }} 
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                          <button class="dropdown-item" type="button">Akun</button>
                      </li>
                      <li>
                          <a href="{{ route('song.create') }}" class="dropdown-item">Upload Lagu</a>
                      </li>
                      <li>
                      <button class="dropdown-item" type="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log-Out</button>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      </li>
                  </ul>
              </div>
              @endif
            </div>
          </div>
        </div>
      </nav>



