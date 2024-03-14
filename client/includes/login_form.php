<!-- Login Form -->
<form id="loginForm" method="POST" action="/phonebook/models/user.php?function=login">
    <div class="form-group mt-4">
        <label for="username">Email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
</form>