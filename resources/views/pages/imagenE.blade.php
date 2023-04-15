<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading mt-5 text-center">
        
        </div>
 
        <div class="panel-body mt-5">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <img src="images/{{ Session::get('image') }}" class="mb-2" style="width:400px;height:200px;">
            @endif
      
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
      
                <div class="mb-3">
                    <label class="form-label" for="inputImage">Seleccione la imagen:</label>
                    <input  type="file" name="image" 
                        id="inputImage"
                        class="form-control @error('image') is-invalid @enderror">
      
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
       
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>

                <div class="col text-right">
          <a href="{{route('profile')}}" class="btn btn-lg btn-success">
            <i class="fas fa-angle-left"></i>
            Regresar</a>
        </div>
       
            </form>

        </div>
    </div>
</div>
</body>
</html>