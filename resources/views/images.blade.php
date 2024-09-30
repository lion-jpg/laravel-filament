<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guias Registrados</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0 20px 0 20px;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    tr:hover {
        background-color: #e6e6e6;
    }

    th {
        background-color: #f4f4f4;
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
        display: none;
        /* Oculta el modal por defecto */
        position: fixed;
        /* Fija el modal en la pantalla */
        z-index: 1;
        /* Asegura que el modal esté encima de otros elementos */
        left: 0;
        top: 0;
        width: 100%;
        /* Ancho completo */
        height: 100%;
        /* Alto completo */
        overflow: auto;
        /* Permite el desplazamiento si es necesario */
        background-color: rgba(0, 0, 0, 0.4);
        /* Fondo semitransparente */
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        /* Centra el modal verticalmente */
        padding: 20px;
        border: 1px solid #888;
        width: 600px;
        /* Ancho del modal */
        max-width: 90%;
        /* Máximo ancho del modal */
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
        flex-direction: column;
        /* Disposición en columna */
        gap: 10px;
        /* Espacio entre los campos */
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="int"],
    textarea,
    input[type="file"] {
        width: 100%;
        /* Ancho completo */
        padding: 8px;
        /* Espaciado interior */
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    button[type="submit"] {
        background-color: #007bff;
        /* Color de fondo del botón */
        color: white;
        /* Texto blanco */
        border: none;
        padding: 10px;
        font-size: 1em;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
        /* Color de fondo al pasar el ratón */
    }

    /* Estilo del botón de cerrar */
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

    /* Estilo de la barra de navegación */
    nav {
        position: sticky;
        top: 0;
        background-color: #e2e2e2;
        /* Fondo rojo */
        padding: 10px 20px;
        /* Espaciado interior */
        display: flex;
        /* Usamos flexbox para la disposición de los elementos */
        align-items: center;
        border-radius: 0 0 8px 8px;
        /* Bordes redondeados en la parte inferior */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        /* Sombra sutil */
    }
    nav img {
            margin-right: auto; /* Empuja el contenido a la derecha */
            
        }
    nav a,
    nav button {
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
    }

    nav img {
        position: end;
    }

    nav a {
        background-color: #6c757d;
        /* Color de fondo para el enlace */
        /* margin-right: 10px; Espacio entre el enlace y el botón */
    }

    nav button {
        background-color: #6c757d;
        /* Color de fondo para el botón */
    }

    nav a:hover,
    nav button:hover {
        opacity: 0.8;
        /* Efecto de hover para ambos */
    }

    .img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    td a,
    td button {
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
    }

    .logo {
        width: 70px;
        height: auto;
    }
    </style>
</head>

<body>
    <nav>

        <img class="logo" src="{{ asset('storage/logo.png') }}" alt="Descripción de la imagen">
        <a href="{{ url('/admin') }}" class="btn-back">Regresar</a>
        <!-- Botón para abrir el formulario en modal -->
        <button id="openModalBtn" class="btn-ge">Agregar Guia</button>

    </nav>
    <!-- @if (session('success'))
    <p class="message success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
    <p class="message error">{{ session('error') }}</p>
    @endif -->
    <!-- Modal para el formulario -->
    <div id="formModal" class="modal">
        <div class="modal-content">
            <!-- Mensajes de éxito y error -->

            <span class="close-btn" onclick="closeModal()">&times;</span>
            <form action="{{ url('admin/add-data') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos">

                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono">

                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion"></input>

                <label for="foto_guia">Foto Guía:</label>
                <input type="file" id="foto_guia" name="foto_guia" accept="image/*">

                <button type="submit" class="btn-generate">Agregar Datos</button>
            </form>
        </div>
    </div>
    <h1>Guias Registrados</h1>
    <div class="conT">
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['data'] as $item)
                @if (isset($item['attributes']['foto_guia']['data'][0]['attributes']['url']))
                <tr>
                    <td><img class="img"
                            src="{{ 'https://backend-culturas.elalto.gob.bo'.$item['attributes']['foto_guia']['data'][0]['attributes']['url'] }}"
                            alt="Image"></td>
                    <td>{{ $item['attributes']['nombre'] }} {{ $item['attributes']['apellidos'] }}</td>
                    <td>{{ $item['attributes']['telefono'] }}</td>
                    <td>{{ $item['attributes']['descripcion'] }}</td>
                    <td><a href="{{ url('/generate-pdf/' . $item['id']) }}" class="btn-generate">Generate PDF</a>
                        <button onclick="window.location='{{ url('admin/editar/' . $item['id']) }}'"
                            class="btn-generate">Editar</button>
                    </td>

                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
    // Obtener el modal
    var modal = document.getElementById("formModal");

    // Obtener el botón que abre el modal
    var openModalBtn = document.getElementById("openModalBtn");

    // Obtener el elemento que cierra el modal
    var closeBtn = document.getElementsByClassName("close-btn")[0];

    // Cuando el usuario hace clic en el botón, abre el modal
    openModalBtn.onclick = function() {
        modal.style.display = "block";
    }

    // Cuando el usuario hace clic en el botón de cerrar (x), cierra el modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Cuando el usuario hace clic fuera del modal, cierra el modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

</body>

</html>