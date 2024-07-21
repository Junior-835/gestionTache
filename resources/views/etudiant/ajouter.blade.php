<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD IN LARAVEL 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 class="text-center">AJOUTER UNE TACHE</h1>
                <hr>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @foreach($errors->all() as $error)
                    <p class="alert alert-danger"> {{ $error }} </p>
                @endforeach

                <form action="/ajouter/traitement" method="POST"> 
                    @csrf 
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="Nom" name="nom">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="Description" class="form-label">Desciption</label>
                        <textarea type="textarea" class="form-control" id="Desciption" name="description"></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="Date" class="form-label">Date d'échéance</label>
                        <!-- readonly est utlise pour empecher la saisie manuelle -->
                        <input type="text" class="form-control" id="date" name="date" placeholder="yyyy-mm-dd" readonly>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="priorite" class="form-label">Priorité</label>
                        <select class="form-select" name="priority">
                            <option value="basse">Basse</option>
                            <option value="moyenne">Moyenne</option>
                            <option value="haute">Haute</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Ajouter une tache</button> 
                    <a href="/liste" class="btn btn-danger">Liste des taches</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- code javascript qui empeche le user de selectionner une date anterieure a la date actuelle -->
    <script>
        $(document).ready(function() {
            $('#date').datepicker({
                startDate: new Date(), // Empêche de sélectionner des dates dans le passé
                todayHighlight: true,
                autoclose: true,
                format: 'yyyy-mm-dd' // format de date
            });
        });
    </script>
  </body>
</html>