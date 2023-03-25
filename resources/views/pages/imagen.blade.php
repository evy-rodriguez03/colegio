@extends('pages.user-profile')

@section('content')
    <h1>Actualizar imagen</h1>

    <img src="{{ Storage::url($image->filename) }}" alt="Imagen">

    <form action="{{ route('image.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="new_image">Nueva imagen</label>
            <input type="file" name="new_image" id="new_image">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection

@section('scripts')
    <script>
        const img = document.querySelector('img');
        img.addEventListener('click', updateImage);

        async function updateImage() {
            const response = await fetch('{{ route('image.show', $image->id) }}');
            const data = await response.json();
            img.src = data.url;
        }
    </script>
@endsection
