<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .chat-row{
                margin: 50px;
            }

            ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }

            ul li{
                padding: 8px 10px ;
                background: greenyellow;
                margin-bottom: 20px;
                width: 800px;
            }

            ul li:nth-child(2n-2){
                background: green;
            }

            .chat-input {
                margin: 50px;
                border: 1px solid lightgray;
                padding:8px 10px;
            }
        </style>
    </head>
    <body>

        <div class="container">
            <div class="row chat-row">
                <div class="chat-content">
                    <ul>
                      
                    </ul>
                </div>
            </div>

            <div class="chat-section">
                <div class="chat-box">
                    <div class="chat-input" id="chatInput" contenteditable="">
                        gfdgfd
                    </div>
                </div>
            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
        <script>
            $(function(){
                let ip_address = '127.0.0.1';
                let socket_port = '3000';
                let socket = io(ip_address + ':' + socket_port);

                let chatInput = $('#chatInput');

                chatInput.keypress(function(e){
                    let message = $(this).html();
                    console.log(message);

                    if(e.which === 13 && !e.shiftKey){
                        socket.emit('SendChatToServer', message);
                        $(this).html('');
                        return false;
                    }
                });

                socket.on('SendChatToClient',(message)=>{
                    $('.chat-content ul').append(`<li>${message}</li>`);
                });
            });
        </script>
    </body>
</html>
