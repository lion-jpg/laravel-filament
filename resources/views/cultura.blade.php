<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culturas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        .container {
            margin-top: 20px;
            overflow-x: auto; /* Permite el desplazamiento horizontal si la tabla es ancha */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-generate {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-generate:hover {
            background-color: #0056b3;
        }

        /* Estilo del Modal */
        .modal {
            display: none; /* Oculta el modal por defecto */
            position: fixed; /* Fija el modal en la pantalla */
            z-index: 1; /* Asegura que el modal esté encima de otros elementos */
            left: 0;
            top: 0;
            width: 100%; /* Ancho completo */
            height: 100%; /* Alto completo */
            overflow: auto; /* Permite el desplazamiento si es necesario */
            background-color: rgba(0, 0, 0, 0.4); /* Fondo semitransparente */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; /* Centra el modal verticalmente */
            padding: 20px;
            border: 1px solid #888;
            width: 600px; /* Ancho del modal */
            max-width: 90%; /* Máximo ancho del modal */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilo para el formulario en el modal */
        form {
            display: flex;
            flex-direction: column; /* Disposición en columna */
            gap: 10px; /* Espacio entre los campos */
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="int"],
        textarea,
        input[type="file"] {
            width: 100%; /* Ancho completo */
            padding: 8px; /* Espaciado interior */
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .img {
            width: 100px;
            height: 60px;
            border-radius: 10%;
        }

        .image-preview {
            text-align: center;
            height: 60%;
            width: auto;
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ url('/admin') }}" class="btn-back">Regresar</a>
        <button id="openModalBtn" class="btn-generate">Agregar Contenido</button>
    </nav>

    <!-- Modal para el formulario  -->
    <div id="formModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <form action="{{ url('admin/c_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="ubicacion">Ubicacion:</label>
                <input type="text" id="ubicacion" name="ubicacion" required>

                <label for="descrip">Descripción:</label>
                <input type="text" id="descrip" name="descrip" required>

                <label for="foto_cult">Fotografia:</label>
                <input type="file" id="foto_cult" name="foto_cult" accept="image/*" required>

                <button type="submit" class="btn-generate">Agregar Contenido</button>
            </form>
        </div>
    </div>

    <!-- Modal para Editar -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeEditModal()">&times;</span>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="edit_titulo">Título:</label>
                <input type="text" id="edit_titulo" name="titulo" required>

                <label for="edit_descrip">Descripción:</label>
                <input type="text" id="edit_descrip" name="descrip" required>

                <label for="edit_ubicacion">Ubicación:</label>
                <input type="text" id="edit_ubicacion" name="ubicacion" required>

                <label for="edit_foto_cult">Fotografía:</label>
                <input type="file" id="edit_foto_cult" name="foto_cult" accept="image/*">

                <div class="image-preview" id="imagePreview"></div>

                <button class="button-azul" type="submit">Actualizar Contenido</button>
            </form>
        </div>
    </div>

    <h1>Turismo Cultural</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Fotografía</th>
                    <th>Título</th>
                    <th>Ubicación</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($data['data']) && is_array($data['data']))
                    @foreach ($data['data'] as $item)
                        @if (isset($item['attributes']['foto_cult']['data'][0]['attributes']['url']))
                            <tr>
                                <td>
                                    <img class="img"
                                        src="{{ 'https://backend-culturas.elalto.gob.bo'.$item['attributes']['foto_cult']['data'][0]['attributes']['url'] }}"
                                        alt="Cultura">
                                </td>
                                <td>{{ $item['attributes']['titulo'] }}</td>
                                <td>{{ $item['attributes']['ubicacion'] }}</td>
                                <td>{{ $item['attributes']['descrip'] }}</td>
                                <td>
                                    <button class="button-azul"
                                        onclick="openEditModal({{ json_encode($item['attributes']) }}, {{ $item['id'] }})">Editar</button>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No se encontraron datos.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script>
        // Obtener el modal
        var modal = document.getElementById("formModal");
        var editModal = document.getElementById("editModal");
        var openModalBtn = document.getElementById("openModalBtn");

        openModalBtn.onclick = function() {
            modal.style.display = "block";
        }

        function closeModal() {
            modal.style.display = "none";
        }

        function closeEditModal() {
            editModal.style.display = "none";
        }

        function openEditModal(data, id) {
            document.getElementById("edit_titulo").value = data.titulo;
            document.getElementById("edit_descrip").value = data.descrip;
            document.getElementById("edit_ubicacion").value = data.ubicacion;

            const imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '';

            if (data.foto_cult && data.foto_cult.data && data.foto_cult.data.length > 0) {
                const imgData = data.foto_cult.data[0].attributes;
                const img = document.createElement('img');
                img.src = 'https://backend-culturas.elalto.gob.bo' + imgData.url;
                img.alt = "Cultura";
                imagePreview.appendChild(img);
            }

            document.getElementById("editForm").action = "{{ url('admin/c_post') }}/" + id;
            editModal.style.display = "block";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            } else if (event.target == editModal) {
                closeEditModal();
            }
        }
    </script>
</x-filament-panels::page>
