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
                <a href="/berita/add">add berita</a>
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Caption</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $no => $brt)
                        <tr>
                            <td>{{$no+$berita->firstItem()}}</td>
                            <td>{{$brt->judul}}</td>
                            <td>{{$brt->caption}}</td>
                            <td><a href="{{asset('/file_berita/'.$brt->file)}}"><button>berita</button></a></td>
                            <td>{{$brt->status}}</td>
                            <td><a href="/berita/edit/{{$brt->id}}">edit</a> | <a href="/berita/delete/{{$brt->id}}" onclick="return confirm('Yakin ingin hapus ? ')">delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </main>
            </div>
    </div>
</div>
</body>
</html>
