<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDAM</title>
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
                <form action="/register" method="post">
                  @csrf     
                  <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
                  <div class="form-floating">
                      <label for="name">username</label>
                    <input type="name" name = "name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" autofocus required>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                      <label for="email">email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com" required>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                      <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
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