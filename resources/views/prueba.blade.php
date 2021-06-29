<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLA DE REGISTROS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div >
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Ultimo visto</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Raza</th>
                    <th scope="col">Comentario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                      <img src="{{ asset($post->foto)}}" class="img-fluid img-thumbnail" width="120">
                    </td>
                    <td>{{ $post->fecha }}</td>
                    <td>{{ $post->telefono }}</td>
                    <td>{{ $post->raza }}</td>
                    <td>{{ $post->comentario }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>