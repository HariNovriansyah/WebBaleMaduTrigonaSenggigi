<button class="floating-chat-button">💬</button>
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
                    <select name="receiver_id" id="receiver_id" class="form-control">
                        @foreach (App\Models\User::where('role', 'user')->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                @endif
                <div class="form-group">
                    <textarea name="message" id="message" class="form-control" rows="2" placeholder="Type a message..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
