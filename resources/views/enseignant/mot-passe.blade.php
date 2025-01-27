<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9179c9d0f1.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="Tout">
        <div class="B">
            <h1 style="margin-top: 200px;font-weight: bold;">Mot de Passe oublié ?</h1> <br>
            <p>Paniquer pas ! Entrer votre email pour un nouveau mot<br>
                de passe.</p>
            <!-- <a href="/inscription.html"> S'inscrire</a> -->

        </div>
    
        <div class="A">
            <h1>Récuperation</h1> <br>
            @if(session('message'))
            <div class="alert alert-success" role="alert" style="margin:20px;">
                {{ session('message') }}
            </div>
            @endif
            <form action="/ajouter/password" method="post">
                @csrf
                <label for="">Email</label> <br>
                 <input type="text" class="form-control"  name="email" id=""><br>
                <br>
                <input type="submit" value="Envoyer" class="X">
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        .Tout{
            display: flex;
        }
        .A{
            margin-left: 0px;
            padding-left: 20px;
            background-color: aliceblue;
            width: 630px;
            height: 550px;
            line-height: 1.3;
        }
        .B{
            margin-left: 0px;
            padding-left: 10px;
            width: 670px;
            background-color: blanchedalmond;
            height: 550px;
            font-family:  Times, serif;


    
        }
        .B a{
            text-decoration: none;
            width: 280px;
            height: 30px;
            border: 1px solid;
            padding: 5px;
            border-radius: 3px;
            border-color: rgb(4, 238, 234);
            color: rgb(4, 238, 234);
            margin-left: 150px;
        }

        /* .A h1{
            margin-left: 250px;
        } */
        .B h1{
            font-size: 50px;
            margin-left: 60px;
        }
        .B p{
            
            font-size: 20px;
            font-weight: bold;
            margin-left: 50px;
        }
        .A label{
        margin-left: 80px;
        font-family:  Times, serif;
        font-size: 20px;

    }
    .A input{
        margin-left: 80px;
        width: 290px;
        font-family:  Times, serif;

    }
    .A h1{
        margin-bottom: 20px;
        margin-left: 120px;
        font-family:  Times, serif;
        font-weight: bold;

    }
    .A select{
        margin-left: 80px;
        width: 290px;
        height: 40px;
        font-family:  Times, serif;
    }
    .A a{
        margin-left: 100px;
        font-size: 20px;
        font-family:  Times, serif;
    }

    .X{
        width: 90px;
        height: 40px;
        border: 1px solid;
        padding: 5px;
        border-radius: 10px;
        border-color: rgb(4, 238, 234);
        background-color:rgb(4, 238, 234) ;
        color: white;
        font-family:  Times, serif;
        font-size: 20px;

    }
    .X:hover {
        background-color: blanchedalmond;
        color: black;

    }
    /* .B a{
        background-color:rgb(4, 238, 234) ;
        color:white;
        border: 1px solid;
        border-radius: 5px;
        width: 250px;
    } */

        
    
    </style>
</html>