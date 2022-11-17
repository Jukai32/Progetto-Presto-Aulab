<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contatto da utente</title>
    
    <style>
        .header-email {
            background-color: rgb(186, 217, 162);
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        
        .email-title {
            font-weight: bold;
            font-size: 80px;
        }
        
        .email-content {
            text-align: center;
        }
        
        .email-subtitle {
            font-size: 50px;
            font-weight: bold;
        }
        
        .email-subtitle2 {
            font-size: 35px;
            font-weight: bold;
        }
        
        .email-paragraph {
            font-size: 25px;
            
        }
        
        .button {
            padding: 15px 35px;
            background-color: #F9A826;
            border: 1px solid #F9A826;
            font-size: 30px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        h1,
        h2,
        h3 {
            color: rgb(119, 176, 75);
        }
        
        a {
            text-decoration: none;
            color: #edfae4;
        }
        
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
            
            <h2 class="email-subtitle">Ciao Admin di PRESTO.IT, hai ricevuto un messaggio, dai un'occhiata!</h1>
                <p class="email-paragraph">Messaggio ricevuto da:{{ $adminData['name'] }}</p>
            </h2>
            <p class="email-paragraph">La sua mail é: {{ $adminData['email'] }}</h2>
                <p class="email-paragraph">Questo é il messaggio:</p>
                <p class="email-paragraph">{{ $adminData['message'] }}</p>
                <h2 class="email-subtitle2">Rispondi al piú "Presto".</h2>
                <br>
                <img src="https://svgsilh.com/svg/310393-f9a826.svg" alt="gif">
                
            </div>
            
        </body>
        
        </html>
        