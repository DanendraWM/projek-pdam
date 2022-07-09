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
                <form action="/berita/add" method="post" enctype="multipart/form-data">
                  @csrf
                  <h1 class="h3 mb-3 fw-normal text-center">add berita</h1>
                  <div class="form-floating">
                    <input type="text" name = "judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="pencopetan di bus" autofocus required>
                    <label for="judul">judul</label>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                  <div class="form-floating">
                    <input type="text" name="caption" class="form-control" id="caption" placeholder="caption" required>
                    <label for="caption">caption</label>
                  </div>
                  <div class="form-floating">
                    <input type="file" name="file" class="form-control" id="file" placeholder="file" required>
                    <label for="file">file</label>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Save berita</button>
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
