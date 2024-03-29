<!DOCTYPE html>
<html>
<head>
    <title>Actualizar imagen de perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-body mt-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                        La imagen "{{ Session::get('image') }}" ha sido actualizada con éxito.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <img src="images/{{ Session::get('image') }}" class="mb-2" style="width:400px;height:200px;">
                @endif

                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="inputImage">Seleccione la imagen:</label>
                        <input  type="file" name="image" id="inputImage" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>




            </div>
            <div class="panel-footer">
                <a href="{{ route('profile') }}" class="btn btn-lg btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Regresar
                </a>
            </div>
        </div>
    </div>
</body>
</html>