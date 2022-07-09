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

<div class="tengah">
    <div class="col-md-4">
        <div class="container mt-5 pt-5 pb-5 bg-light">
            <main class="form-signin">
                <form action="/confirm/admin/{{$berita->id}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <h1 class="h3 mb-3 fw-normal text-center">add berita</h1>
                  <div class="form-floating">
                    <input type="radio" id="terima" name="confirm" value="terima">
                    <label for="terima">terima</label>
                    <input type="radio" id="tolak" name="confirm" value="tolak">
                    <label for="tolak">tolak</label>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Confirm</button>
                </form>
                {{-- <small class="d-block text-center mt-3">Not registered?
                    <a href="/register">Register Now!</a>
                </small> --}}
              </main>
            </div>
    </div>
</div>
</body>
</html>
