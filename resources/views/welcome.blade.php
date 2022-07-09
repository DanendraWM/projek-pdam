<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>

    <main>

        <header>
            <!-- navigasi -->
        </header>
        <h1>{{ auth()->user()->name }}</h1>
        <div class="tengah">
            <div class="col-md-4">
                <div class="container mt-5 pt-5 pb-5 bg-light">
                    <main class="form-signin">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="w-100 btn btn-lg btn-primary" type="submit">logout</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        @if (auth()->user()->level === 'admin')
            <button>Role</button>
        @else
            <h1>Kamu user biasa</h1>
        @endif
</body>

</html>
