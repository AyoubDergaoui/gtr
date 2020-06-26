<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GTR</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css" rel="stylesheet" integrity="sha384-rCA2D+D9QXuP2TomtQwd+uP50EHjpafN+wruul0sXZzX/Da7Txn4tB9aLMZV4DZm" crossorigin="anonymous">
    <style>
      body {
        position: relative;
        /* background: #f8f9fa; */
      }
      .login-card {
        background: #444;
        margin: 12px -10px;
        padding: 16px;
        border: 1px solid transparent;
        box-shadow: 0 20px 20px -20px rgba(0, 0, 0, 0.4);
        border-radius: 5px;
      }
      .img-logo {
        max-width: 250px;
        width: 100%;
      }
    </style>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto col-sm-8">
        <div class="login-card">
          <div class="text-center">
            <img class="img-logo" src="https://upload.wikimedia.org/wikipedia/fr/5/5a/Colas_logo_vector.png" alt="GTR Logo">
          </div>
          <h1>Login to access content</h1>
          <p>In order to see the content you must log in into the system.</p>
          <a href="{{ route('login') }}" class="btn btn-warning">Log in</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
