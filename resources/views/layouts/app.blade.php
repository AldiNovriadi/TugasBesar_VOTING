{{-- TAMPILAN UNTUK LAYOUT HEADING --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Besar VOTING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/voting/">Tugas Besar VOTING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link text-light"> | </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link" href="/voting"> Home </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link" href="/voting/create"> Create Voting </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link text-light"> {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link text-light"> | </a>
                </li>
                <li class="nav-item dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        </dropdown-link>

                        <button type="submit"> Logout </button>
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link text-light" href="/login"> Login Akun </a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- Yield tersebut untuk menggantikan ke section yang ada folder barang --}}
    <div class="container">
        @yield("content")
    </div>
</body>

</html>
