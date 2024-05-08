<form method="POST" action="/password/email">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <button type="submit">Send Password Reset Link</button>
</form>

