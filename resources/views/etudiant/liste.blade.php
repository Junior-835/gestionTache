<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .wrap-text{
        word-wrap: break-word;
        white-space: normal;
        word-break: break-all;
    }
</style>
  </head>
  <body>

    <div class="container text-center">
        <div class="row">
            <div class="col s12">
                <h1>LISTE DES TACHES</h1>
                <hr>
                <a href="/ajouter" class="btn btn-primary">Ajouter une tache</a>
                <hr> 

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Desciption</th>
                            <th scope="col">Date d'échéance</th>
                            <th scope="col">Priorité</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                            $ide = 1;
                        @endphp
                        @foreach($etudiants as $etudiant)
                        <tr>
                            <th scope="row">{{ $ide }}</th>
                            <td>{{ $etudiant->nom }}</td>
                            <td class="wrap-text">{{ $etudiant->description }}</td>
                            <td>{{ $etudiant->date }}</td>
                            <td>{{ $etudiant->priority }}</td>
                            <td></td>
                            <td>
                                <a href="/update_tache/{{ $etudiant->id }}" class="btn btn-info">Update</a>
                                <a href="/delete_tache/{{ $etudiant->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @php 
                            $ide += 1;
                        @endphp
                        @endforeach
                    </tbody>
                </table>

                {{ $etudiants->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>