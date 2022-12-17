<h1>ログイン画面</h1>
<form method="POST" role="form" action="{{ route('user.login') }}">
<table>
    <tr>
        <td>名前：</td>
        <td><input type="text" name="username"></input></td>
    </tr>
    <tr>
        <td>パスワード：</td>
        <td><input type="password" name="password"></input></td>
    </tr>
</table>
{{ csrf_field() }}
<button type="submit">ログイン</button>
</form>