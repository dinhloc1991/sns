<h1>ログイン画面</h1>
<form method="POST" action="{{ route('login') }}">
<table>
    <tr>
        <td>メール：</td>
        <td>
            <input type="text" name="email"></input>
    
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </td>
    </tr>
    <tr>
        <td>パスワード：</td>
        <td>
            <input type="password" name="password"></input>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </td>
    </tr>
</table>
{{ csrf_field() }}
<button type="submit">ログイン</button>
</form>