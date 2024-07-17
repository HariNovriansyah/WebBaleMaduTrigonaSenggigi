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
        /* :root{
            --bs-primary : #ffbd67 !important;
            --bs-blue : #ffbd67 !important;
        } */
         .main-bg{
            background-color: #ffbd67;
         }
         .floating-chat-button {
            position: fixed;
            bottom: 2.5rem;
            right: 2.5rem;
            background-color: #ffbd67;
            color: white;
            border: none;
            border-radius: 50%;
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 36px;
            z-index: 1030;
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
            z-index: 1030;
        }

        .chat-window {
            position: fixed;
            bottom: 80px;
            right: 7.5rem;
            width: 300px;
            height: 500px;
            border: 1px solid #ddd;
            background-color: white;
            box-shadow: 0 4px 8px #00000033;
            z-index: 999;
            display: flex;
            flex-direction: column;
            border-radius: 0.8rem;
        }

        .chat-header {
            padding: .75rem 1.25rem;
            font-weight: 500;
            margin-bottom: 0;
            background-color: #ffbd67;
            color: #30393d;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top-right-radius: 0.8rem;
            border-top-left-radius: 0.8rem;
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
            color: #30393d;
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

        /* Custom button styles */
        .button,
        button {
            background-color: #ffbd67;
            /* Custom background color */
            color: #30393d;
            /* Custom text color */
            border: none;
            /* Remove border */
            padding: .375rem .75rem;
            /* Adjust padding to match Bootstrap */
            border-radius: .25rem;
            /* Border radius to match Bootstrap */
            cursor: pointer;
            /* Pointer cursor on hover */
            text-decoration: none;
            /* Remove text decoration */
            font-weight: 500;
            /* Adjust font weight */
            display: inline-block;
            /* Ensure display is inline-block */
            text-align: center;
            /* Center text */
            vertical-align: middle;
            /* Align vertically in the middle */
            line-height: 1.5;
            /* Set line height */
        }

        .button:hover,
        button:hover {
            background-color: #f0a440;
            /* Change background color on hover */
            text-decoration: none;
            /* Ensure text decoration is none on hover */
            color: #30393d;
            /* Ensure text color remains the same on hover */
        }

        </style>

</head>

<body>

    @include('user.layouts.navbar')

    @yield('content')

    @include('app.components.chat')
    @include('user.layouts.footer')

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
            }, 2000); // Polling every 5 seconds
        });
    </script>

</body>

</html>
