
@extends($layout)
@section('content')

<div class="container bg-white p-4 rounded-4">
    <div>
        @include('profile.partials.update-profile-information-form')
    </div>

    <div>
        @include('profile.partials.update-password-form')
    </div>

    <div>
        @include('profile.partials.delete-user-form')
    </div>
</div>


@endsection

