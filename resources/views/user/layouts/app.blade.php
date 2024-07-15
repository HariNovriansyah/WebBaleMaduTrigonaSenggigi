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

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/templates/lib/animate/animate.min.css') }}"/>
        <link href="{{ asset('assets/templates/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/templates/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/templates/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/templates/css/style.css') }}" rel="stylesheet">

        <style>
            .floating-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f8f9fa;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 15px;
            cursor: pointer;
            z-index: 1000;
        }

        .chat-window {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 350px;
            height: 500px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 1000;
        }

        .chat-header {
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .chat-body {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
        }

        .form-control{
            margin-bottom: 10px;
        }

        .chat-footer {
            padding: 10px;
            background-color: #f1f1f1;
        }

        @media (max-width: 600px) {
            .chat-window {
                width: 50%;
                border-radius: 10px;
                bottom: 20px;
                right: 20px;
                width: 350px;
                height: 500px;
            }

            .chat-header {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        }
        </style>

</head>

<body>

    @include('user.layouts.navbar')

    @yield('content')

    @include('app.components.chat')

    {{-- <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a> --}}

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/templates/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets/templates/js/main.js') }}"></script>

    <script src="{{ asset('assets/templates/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('script')
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
