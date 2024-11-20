<form action="{{ route('users.create') }}" method="POST" class="action-form">
    @csrf
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" required>
    </div>
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" required>
    </div>
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div class="form-group">
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            @foreach($genders as $value => $name)
                <option value="{{ $value }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <div class="action">
        <button type="submit" class="btn-main">Create</button>
    </div>
</form>
