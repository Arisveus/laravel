<h1>login</h1>
<hr>

@if ($errors->any())
    <div style="color:red">
    <h3><b>Erro!</b></h3>

    <ul>
        @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
    </div>
@endif

<form action="{{ route('autentica.login') }}" method="post">
    @csrf
    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
    <br><br>
    <input type="password" name="password" placeholder="Senha">
    <br><br>
    <input type="submit" value="Acessar">
</form>