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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <style>
        .sidebar {
            top: 72px;
            left: 0;
            width: 250px;
            height: calc(100vh - 72px);
            padding: 20px;
            position: fixed;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar p {
            color: #405d72;
            font-weight: 700;
            text-decoration: none;
            padding: 0.4rem;
            border-radius: 0.8rem;

        }

        .sidebar a {
            color: #474d53;
            text-decoration: none;
            padding: 0.4rem;
            padding-left: 1rem;
            border-radius: 0.8rem;

        }

        .sidebar a:hover {
            color: #1f2f3c;
            background-color: #ff910044;
        }

        .sidebar .dropdown-toggle::after {
            display: none;
        }

        /* Custom CSS for sidebar dropdowns */
        .sidebar-dropdown {
            position: relative;
            /* Ensure dropdowns are positioned relative to parent */
            display: none;
            /* Hide dropdown by default */
            margin-top: 0;
            /* Remove any default margin that might cause gap */
            border: none;
            /* Remove any border */
            box-shadow: none;
            /* Remove any shadow */
        }

        /* Show the dropdown when the parent link is active/hovered */
        .nav-item.dropdown:hover .sidebar-dropdown {
            display: block;
            /* Show dropdown on hover */
            position: static;
            /* Ensure dropdown stays within the flow of the document */
        }

        .sidebar .dropdown-menu {
            background-color: #fff;
            /* Same background as sidebar */
            border-radius: 0;
            /* Adjust radius to fit design */
            box-shadow: none;
            /* Remove shadow */
            padding: 0;
            /* Adjust padding as needed */
        }

        /* Custom CSS for sidebar dropdowns */
        .sidebar .collapse {
            background-color: #fff;
            /* Same background as sidebar */
            border-radius: 0;
            /* Adjust radius to fit design */
            box-shadow: none;
            /* Remove shadow */
            padding: 0.8rem;
            /* Adjust padding as needed */
            margin-left: 1rem;
            /* Add left margin for nested items */
        }

        .sidebar .nav-link {
            color: #474d53;
            /* Adjust text color */
            font-weight: 500;
            /* Make text bold */
            display: flex;
            /* Align items in flex */
            justify-content: space-between;
            /* Space between text and icon */
        }

        .sidebar .dropdown-item {
            /* Adjust padding as needed */
            color: #474d53;
            /* Adjust text color */
        }

        .sidebar .dropdown-item li a {
            margin: 0 !important;
            padding: 0 !important;
        }

        .sidebar .nav-item .nav-link .bi {
            font-size: 1rem;
            /* Adjust icon size */
            margin-left: auto;
            /* Align icon to the right */
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
            font-family: "Montserrat", sans-serif;
            font-weight: 300;
            background-color: lightgray;
        }

        .floating-chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #ffbd67;
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

        .button:focus,
        button:focus {
            outline: 0;
            /* Remove outline on focus */
            box-shadow: 0 0 0 .25rem rgba(255, 189, 103, .5);
            /* Match Bootstrap focus shadow */
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil URL saat ini
            var currentUrl = window.location.href;

            // Dapatkan semua link di sidebar
            var sidebarLinks = document.querySelectorAll('.sidebar .nav-link, .sidebar .dropdown-item');
            var dropdownToggles = document.querySelectorAll('.sidebar .nav-link.dropdown-toggle');

            // Loop melalui setiap link
            sidebarLinks.forEach(function(link) {
                // Jika href link adalah sama dengan URL saat ini
                var routes = link.getAttribute('data-route').split(' ');
                if (routes.includes(currentUrl)) {
                    // Tambahkan background color
                    link.style.backgroundColor = "#ff910065"; // Ganti dengan warna yang diinginkan

                    // Jika link ini ada di dalam dropdown, buka dropdown
                    var parentCollapse = link.closest('.collapse');
                    if (parentCollapse) {
                        parentCollapse.classList.add('show');
                        link.style.backgroundColor = "#769cbb65";
                        var dropdownToggle = parentCollapse.previousElementSibling;
                        if (dropdownToggle && dropdownToggle.classList.contains('dropdown-toggle')) {
                            dropdownToggle.style.backgroundColor =
                                "#ff910065"; // Ganti dengan warna yang diinginkan
                            dropdownToggle.setAttribute('aria-expanded', 'true');
                        }
                    }
                }
            });
        });
    </script>
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
