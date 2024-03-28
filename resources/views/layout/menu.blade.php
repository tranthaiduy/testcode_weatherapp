    <div class="container px-2.5">
        <div class="row">
            <nav class="navbar navbar-primary bg-primary">
                <a class="navbar-brand text-white" href="{{ route('get-weather') }}">Weather Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse p-2 m-2 bg-light" id="navbarsExample01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('history') }}">History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('subscribe') }}">Notification</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
        </div>
    </div>