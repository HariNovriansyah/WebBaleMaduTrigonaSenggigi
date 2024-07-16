<i class="floating-chat-button"><span class="badge" style="display: none;"></span>
    <i class="text-secondary" style="font-style: normal;">💬</i>
</i>
<div class="chat-window" id="chat-window">
    <div class="chat-header">
        <span>Chat</span>
        <span class="close-btn" onclick="toggleChatWindow()">✖</span>
    </div>
    <div class="chat-body" id="chat-box">
    </div>
    <div class="chat-footer">
        <form id="chat-form">
            @csrf
                @if (Auth::user()->role == 'admin')
                <div class="dropdown mb-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Select User
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        @foreach (App\Models\User::where('role', 'user')->get() as $user)
                            <li><a class="dropdown-item" href="#" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}">{{ $user->name }}<span class="badge bg-danger ms-2" style="display: none;"></span></a></li>
                            <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $user->id }}">
                        @endforeach
                    </ul>
                </div>
                @endif
            <div class="form-group">
                <textarea name="message" id="message" class="form-control" rows="9" placeholder="Type a message..." style="min-height: 40px; height: 40px;"></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
