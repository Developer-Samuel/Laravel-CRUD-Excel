<form action="{{ route('users.update', ['id' => $user->ID]) }}" method="POST" class="action-form">
    @csrf
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" value="{{ $user->Firstname }}" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" value="{{ $user->Lastname }}" required>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ $user->Username }}" class="disabled" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $user->Email }}" class="disabled" readonly>
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            @foreach($genders as $value => $name)
                <option value="{{ $value }}" @if(strtolower($user->Gender) === $value) selected @endif>{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="action">
        <button type="submit" class="btn-main">Update</button>
    </div>
</form>
