<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Times New Roman', serif;
      background: #f3f4f6;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container-login {
      display: flex;
      max-width: 900px;
      width: 90%;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .container-login .left-panel {
      background: blanchedalmond;
      padding: 40px;
      width: 50%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }

    .container-login .left-panel h1 {
      font-size: 2.5rem;
      color: #333;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .container-login .left-panel p {
      font-size: 1.1rem;
      font-weight: bold;
      color: #555;
    }

    .container-login .right-panel {
      background: aliceblue;
      padding: 40px;
      width: 50%;
    }

    .container-login .right-panel h1 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    form label {
      font-weight: bold;
      margin-top: 10px;
    }

    form input,
    form select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-family: 'Times New Roman', serif;
    }

    form input[type="submit"] {
      background-color: rgb(4, 238, 234);
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease-in-out;
      border-radius: 10px;
    }

    form input[type="submit"]:hover {
      background-color: blanchedalmond;
      color: black;
    }

    .forgot-password {
      display: block;
      text-align: center;
      color: rgb(4, 238, 234);
      font-weight: bold;
      text-decoration: none;
      margin-top: -5px;
    }

    .forgot-password:hover {
      text-decoration: underline;
    }

    .alert {
      text-align: center;
      margin-top: 10px;
    }

    .eye-icon {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }

    .password-container {
      position: relative;
    }
  </style>
</head>

<body>
  <div class="container-login">
    <!-- Left Panel -->
    <div class="left-panel">
      <h1>G-TEACHER</h1>
      <p>Entrez vos coordonnées personnelles et commencez votre voyage avec nous.</p>
      @error('email','password')
      <div class="alert alert-danger" role="alert">
        {{ $message }}
      </div>
      @enderror
    </div>
    <!-- Right Panel -->
    <div class="right-panel">
      <h1>Se connecter</h1>
      @if(session('message'))
      <div class="alert alert-success" role="alert">
        {{ session('message') }}
      </div>
      @endif
      <form action="/ajouter/utilisateur" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" >
        <label for="role">Rôle</label>
        <select class="form-select" name="role" id="role">
          <option value="admin">Admin</option>
          <option value="professeur">Professeur</option>
        </select>
        <label for="password">Mot de Passe</label>
        <div class="password-container">
          <input type="password" class="form-control" name="password" id="password" >
          <i class="fas fa-eye eye-icon" id="toggle-password"></i>
        </div>
        <a href="/mot/passe" class="forgot-password">Mot de Passe Oublié ?</a>
        <input type="submit" value="Connexion">
      </form>
    </div>
  </div>

  <script>
    document.getElementById('toggle-password').addEventListener('click', function() {
      var passwordField = document.getElementById('password');
      var type = passwordField.type === 'password' ? 'text' : 'password';
      passwordField.type = type;
      this.classList.toggle('fa-eye-slash');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
