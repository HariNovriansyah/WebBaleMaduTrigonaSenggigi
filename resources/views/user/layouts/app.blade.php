<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Madu Trigona</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::user()->id }}">
    <meta name="user-role" content="{{ Auth::user()->role }}">
    <meta name="api-token" content="">
    @yield('style')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .floating-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 24px;
            cursor: pointer;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-window {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 300px;
            height: 500px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 999;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            padding: 10px;
            background-color: #007bff;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header .close-btn {
            cursor: pointer;
        }

        .chat-body {
            padding: 10px;
            height: calc(100% - 110px);
            overflow-y: scroll;
        }

        .chat-footer {
            padding: 10px;
            border-top: 1px solid #ddd;
            margin-top: auto;
        }

        .chat-bubble {
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
            width: fit-content;
            max-width: 75%;
            word-wrap: break-word;
        }

        .chat-bubble.sent {
            background-color: #dcf8c6;
            align-self: flex-end;
            margin-left: auto;
        }

        .chat-bubble.received {
            background-color: #f1f0f0;
            align-self: flex-start;
            margin-right: auto;
        }

        .badge-danger {
            background-color: #ff3860;
            color: #fff;
            border-radius: 5px;
            padding: 2px 5px;
            margin-left: 5px;
        }

        form {
            margin-top: 20px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        textarea {
            width: 100%;
            /* Atur lebar 100% agar mengisi parent element */
            max-width: calc(100%);
            /* Misalnya, batasi lebar maksimum dengan mengurangi margin atau padding jika ada */
            padding: 10px;
            min-height: 42px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            /* Hanya izinkan mengubah tinggi, bukan lebar */
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('user.layouts.navbar')
    <div>
        <main>
            @yield('content')
        </main>
        @include('app.components.chat')
    </div>
    @include('user.layouts.footer')
    @yield('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleChatWindow() {
            $('#chat-window').toggle();
        }

        function fetchChats(userId = null) {
            var url = '/api/chats';
            if (userId) {
                url += '?user_id=' + userId;
            }
            $.ajax({
                url: url,
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
                },
                success: function(data) {
                    var chatBox = $('#chat-box');
                    chatBox.empty();
                    data.forEach(function(chat) {
                        var createdAt = new Date(chat.created_at);
                        var formattedTime = createdAt.toLocaleString();
                        var bubbleClass = chat.sender_id == $('meta[name="user-id"]').attr('content') ? 'sent' : 'received';
                        chatBox.append('<div class="chat-bubble ' + bubbleClass +
                            '"><p style="margin:0;"><strong>' + chat.sender.name + '</strong></p><p style="margin:0;">' + chat.message + '<br><small style="font-size:9px;">' + formattedTime +
                            '</small>' + '</p></div>');
                    });
                    chatBox.scrollTop(chatBox[0].scrollHeight);
                }
            });
        }

        function fetchUnreadCount() {
            $.ajax({
                url: '/api/chats/unread-count',
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
                },
                success: function(data) {
                    var unreadCount = data.unread_count;
                    if (unreadCount > 0) {
                        $('.floating-chat-button .badge').text(unreadCount).show();
                    } else {
                        $('.floating-chat-button .badge').hide();
                    }
                }
            });
        }

        $(document).ready(function() {
            var token = localStorage.getItem('api-token');
            if (token) {
                $('meta[name="api-token"]').attr('content', token);
            }

            $('#chat-window').hide();
            // Show/hide chat window
            $('.floating-chat-button').on('click', function() {
                toggleChatWindow();
                fetchChats($('#receiver_id').val());
            });

            $('#chat-form').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: '/api/chats',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
                    },
                    success: function(response) {
                        fetchChats($('#receiver_id').val());
                        $('#message').val('');
                    }
                });
            });

            $('#receiver_id').on('change', function() {
                fetchChats($(this).val());
            });

            setInterval(function() {
                fetchChats($('#receiver_id').val());
                fetchUnreadCount();
            }, 2000); // Polling every 2 seconds
        });
    </script>
</body>

</html>
