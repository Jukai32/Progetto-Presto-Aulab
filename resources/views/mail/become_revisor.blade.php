<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Richiesta per revisore</title>
    
    <style>
        .header-email{
            background-color: rgb(186, 217, 162);
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .email-title{
            font-weight: bold;
            font-size: 80px;
        }
        .email-content{
            text-align: center;
        }
        .email-subtitle{
            font-size: 50px;
            font-weight: bold;
        }
        .email-subtitle2{
            font-size: 35px;
            font-weight: bold;
        }
        .email-paragraph{
            font-size: 25px;
            
        }
        .button{
            padding: 15px 35px;
            background-color: #F9A826;
            border: 1px solid #F9A826;
            font-size: 30px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        h1,h2{color:rgb(119, 176, 75);}
        a{text-decoration: none;
            color:#edfae4;}
            
            img{border-radius: 10px;
                height: 150px;
                width: 150px;}
            </style>
        </head>
        
        
        <body>
            <header class="header-email ">
                <h1 class="email-title ">Presto.it</h1>
                
                
            </header>
            
            <div class="email-content">
                <h2 class="email-subtitle">C'è una richiesta di collaborazione per te</h2>
                
                
                
                <h2 class="email-subtitle2">Richiesta inoltrata da:</h2>
                <p class="email-paragraph">Nome: {{$user->name}}</p>
                <p class="email-paragraph">Email: {{$user->email}}</p>
                
                <br>
                <button class="button"><a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>
                </button>
                <br>
                
                <img src="https://svgsilh.com/svg/308908-f9a826.svg" alt="gif">
                
                
            </div>
            
            
        </body>
        
        </html>