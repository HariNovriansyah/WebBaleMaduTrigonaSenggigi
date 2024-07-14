<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Madu Trigona</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::user()->id }}">
    <meta name="user-role" content="{{ Auth::user()->role }}">
    <meta name="api-token" content="">
    @yield('style')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .sidebar {
            top: 56px;
            left: 0;
            width: 250px;
            height: calc(100vh - 56px);
            background-color: #f0f0f0;
            padding: 20px;
            border-right: 1px solid #ddd;
            position: fixed;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            color: #ffc107;
            text-decoration: none;
        }

        .sidebar a:hover {
            color: #e38e20;
        }

        .sidebar .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 12px;
            font-weight: bold;
            content: "\f107";
            font-family: "Font Awesome 5 Free";
        }

        .sidebar .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 160px;
            padding: .5rem 0;
            margin: .125rem 0 0;
            font-size: .875rem;
            text-align: left;
            list-style: none;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: .25rem;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
        }

        .sidebar .dropdown-menu.show {
            display: block;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 5rem;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .floating-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffc107;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 24px;
        }

        .floating-chat-button .badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 3px 6px;
            font-size: 12px;
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
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: #ffc107;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-header .close-btn {
            cursor: pointer;
        }

        .chat-body {
            flex: 1 1 auto;
            padding: 1rem;
            overflow-y: auto;
        }

        .chat-footer {
            padding: .75rem 1.25rem;
            border-top: 1px solid #ddd;
            margin-top: auto;
        }

        .chat-bubble {
            border-radius: .25rem;
            padding: .5rem 1rem;
            margin-bottom: 1rem;
            width: fit-content;
            max-width: 75%;
            word-wrap: break-word;
        }

        .chat-bubble.sent {
            background-color: #ffecb5;
            align-self: flex-end;
            margin-left: auto;
        }

        .chat-bubble.received {
            background-color: #e9ecef;
            align-self: flex-start;
            margin-right: auto;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
            border-radius: .25rem;
            padding: .25rem .5rem;
            margin-left: .5rem;
        }

        form {
            margin-top: 20px;
        }

        select {
            width: 100%;
            padding: .5rem .75rem;
            margin-bottom: 1rem;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }

        textarea {
            width: 100%;
            max-width: 100%;
            padding: .5rem .75rem;
            min-height: 42px;
            margin-bottom: 1rem;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            resize: vertical;
            box-sizing: border-box;
        }

        button {
            background-color: #ffc107;
            color: #fff;
            border: none;
            padding: .5rem 1rem;
            border-radius: .25rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #e38e20;
        }
    </style>
</head>

<body>
  @include('admin.layouts.navbar')
    <div>
        <main class="content">
            @yield('content')
        </main>
        @include('app.components.chat')
    </div>
    @include('admin.layouts.footer')
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
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
                    var hasUnreadMessages = false;
                    data.forEach(function(chat) {
                        var createdAt = new Date(chat.created_at);
                        var formattedTime = createdAt.toLocaleString();
                        var bubbleClass = chat.sender_id == $('meta[name="user-id"]').attr('content') ?
                            'sent' : 'received';
                        chatBox.append('<div class="chat-bubble ' + bubbleClass +
                            '"><p style="margin:0;"><strong>' + chat.sender.name +
                            '</strong></p><p style="margin:0;">' + chat.message +
                            '<br><small style="font-size:9px;">' + formattedTime +
                            '</small>' + '</p></div>');

                        if (!chat.read_at) {
                            hasUnreadMessages = true;
                        }
                    });
                    chatBox.scrollTop(chatBox[0].scrollHeight);

                    if (userId && hasUnreadMessages) {
                        markAsRead(userId);
                    }
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
                    var userRole = $('meta[name="user-role"]').attr('content');

                    if (userRole === 'admin') {
                        var totalUnreadCount = 0;
                        $.each(data, function(userId, count) {
                            totalUnreadCount += count;
                            var userOption = $('#option' + userId);
                            if (count > 0) {
                                userOption.find('.badge').text(count).show();
                            } else {
                                userOption.find('.badge').hide();
                            }
                        });
                        if (totalUnreadCount > 0) {
                            $('.floating-chat-button .badge').text(totalUnreadCount).show();
                        } else {
                            $('.floating-chat-button .badge').hide();
                        }
                    } else {
                        var unreadCount = data.unread_count;
                        if (unreadCount > 0) {
                            $('.floating-chat-button .badge').text(unreadCount).show();
                        } else {
                            $('.floating-chat-button .badge').hide();
                        }
                    }
                }
            });
        }

        function markAsRead(userId) {
            $.ajax({
                url: '/api/chats/mark-as-read',
                method: 'POST',
                data: {
                    user_id: userId
                },
                headers: {
                    'Authorization': 'Bearer ' + $('meta[name="api-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Messages marked as read.');
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
            var userRole = $('meta[name="user-role"]').attr('content');

            // Show/hide chat window
            $('.floating-chat-button').on('click', function() {
                toggleChatWindow();
                var userId = $('#receiver_id').val();

                if (userRole === 'admin') {
                    if (userId) {
                        fetchChats(userId);
                        if ($('.floating-chat-button .badge').is(':visible')) {
                            markAsRead(userId);
                        }
                    }
                } else {
                    fetchChats();
                    if ($('.floating-chat-button .badge').is(':visible')) {
                        markAsRead();
                    }
                }
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
                markAsRead($(this).val());
            });

            setInterval(function() {
                fetchChats($('#receiver_id').val());
                fetchUnreadCount();
            }, 2000); // Polling every 2 seconds
        });
    </script>
</body>

</html>
