
@extends($layout)
@section('content')

<h2>Profile</h2>

<div>
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

