<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Guía</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
            font-size: 1em;
        }

        button:hover {
            background-color: #0056b3;
        }

        .image-preview {
            margin-top: 20px;
            text-align: center;
        }

        .image-preview img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        nav {
        background-color: #e2e2e2;
        /* Fondo rojo */
        padding: 10px 20px;
        /* Espaciado interior */
        display: flex;
        /* Usamos flexbox para la disposición de los elementos */
        justify-content: flex-end;
        /* Alinea el contenido al final */
        border-radius: 0 0 8px 8px;
        /* Bordes redondeados en la parte inferior */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Sombra sutil */
    }

    nav a {
        color: white;
        /* Texto blanco */
        text-decoration: none;
        /* Sin subrayado en el enlace */
        padding: 10px 20px;
        /* Espaciado interior */
        border: none;
        /* Sin borde en los botones */
        border-radius: 5px;
        /* Bordes redondeados */
        font-size: 1em;
        /* Tamaño de fuente */
        cursor: pointer;
        /* Cursor de mano */
        margin-left: 10px;
        /* Espacio entre los elementos */
        background-color: #6c757d;
        /* Color de fondo para el enlace */
    }
    nav a:hover{
        opacity: 0.8;
        /* Efecto de hover para ambos */
    }
    </style>
</head>
<body>
<nav>
        <a href="{{ url('/guia') }}" class="btn-back">Regresar</a>
        <!-- Botón para abrir el formulario en modal -->

    </nav>
    <h1>Editar Guía</h1>

    <form action="{{ route('update', $user['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $user['attributes']['nombre'] }}">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="{{ $user['attributes']['apellidos'] }}">

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" value="{{ $user['attributes']['telefono'] }}">

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ $user['attributes']['descripcion'] }}">

        <label for="foto_guia">Foto Guía:</label>
        <input type="file" id="foto_guia" name="foto_guia" accept="image/*" onchange="previewImage(event)">

        <div class="image-preview" id="imagePreview">
            @if (isset($user['attributes']['foto_guia']['data'][0]['attributes']['url']))
                <img src="{{ 'https://backend-culturas.elalto.gob.bo' . $user['attributes']['foto_guia']['data'][0]['attributes']['url'] }}" alt="Imagen de la guía">
            @endif
        </div>

        <button type="submit">Actualizar Datos</button>
    </form>

    <script>
        function previewImage(event) {
            const previewContainer = document.getElementById('imagePreview');
            previewContainer.innerHTML = ''; // Limpiar el contenido previo
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    previewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
