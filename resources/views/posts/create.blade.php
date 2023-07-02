<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Data Post - SantriKoding.com</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

  <div class="container mt-5 mb-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 shadow rounded">
          <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

              {{ csrf_field() }}

              <div class="form-group">
                <label class="font-weight-bold">GAMBAR</label>
                <input type="file" class="form-control {{ session('error') }} is-invalid @enderror" name="image">

                <!-- error message untuk title -->
                @if (session('error'))
                  <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                  </div>
                @endif
              </div>

              <div class="form-group">
                <label class="font-weight-bold">JUDUL</label>
                <input type="text" class="form-control {{ session('error') }} is-invalid @enderror" name="title"
                  value="{{ old('title') }}" placeholder="Masukkan Judul Post">

                <!-- error message untuk title -->
                @if (session('error'))
                  <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                  </div>
                @endif
              </div>

              <div class="form-group">
                <label class="font-weight-bold">KONTEN</label>
                <textarea class="form-control {{ session('error') }} is-invalid @enderror" name="content" rows="5"
                  placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>

                <!-- error message untuk content -->
                @if (session('error'))
                  <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                  </div>
                @endif
              </div>

              <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
              <button type="reset" class="btn btn-md btn-warning">RESET</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    //message with toastr
    @if (session()->has('success'))

      toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (session()->has('error'))

      toastr.error('{{ session('error') }}', 'GAGAL!');
    @endif

    CKEDITOR.replace('content');
  </script>
</body>

</html>
