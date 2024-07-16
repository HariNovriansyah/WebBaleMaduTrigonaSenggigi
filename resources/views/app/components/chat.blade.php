<i class="floating-chat-button">
    <i class="fa fa-comment-dots text-secondary fa-2x"></i>
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
                <select name="receiver_id" id="receiver_id" class="form-control">

                    @foreach (App\Models\User::where('role', 'user')->get() as $user)
                        <option id="option{{ $user->id }}" value="{{ $user->id }}">{{ $user->name }}<span class="badge" style="display: none;"></span></option>
                    @endforeach
                </select>
            @endif
            <div class="form-group">
                <textarea name="message" id="message" class="form-control" rows="9" placeholder="Type a message..."></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
