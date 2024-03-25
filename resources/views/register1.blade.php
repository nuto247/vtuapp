<form method="POST" action="{{ route('register') }}">
    @csrf

    <input type ="text" name="name">
    <input type ="text" name="email">
    <input type="password" name="password">
    <input type="submit" value="Submit">
</form>
