<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buatan djncloud</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div id="main">
            <h1>chattan rahasia</h1>
            <div id="chat-box"></div>
            <form id="message-form">
                <input type="text" name="username" placeholder="Enter your name" required>
                <input type="text" name="message" placeholder="Enter your message" required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#message-form").on("submit", function(event){
                event.preventDefault();
                $.ajax({
                    url: "sent_chat.php",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(data){
                        loadChat();
                        $("#message-form")[0].reset();
                    }
                });
            });

            function loadChat() {
                $.ajax({
                    url: "fetch_chat.php",
                    method: "GET",
                    success: function(data){
                        $("#chat-box").html(data);
                    }
                });
            }

            $(document).on("click", ".delete-btn", function(){
                var messageId = $(this).data("id");
                $.ajax({
                    url: "delete_chat.php",
                    method: "POST",
                    data: { id: messageId },
                    success: function(data){
                        loadChat();
                    }
                });
            });

            loadChat();
            setInterval(loadChat, 3000);
        });
    </script>
</body>
</html>
