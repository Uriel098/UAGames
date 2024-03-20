@vite(['resources/css/estilo.css'])
<div class="login">
	<h1>Login</h1>
    <form method="post">
    	<input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Iniciar Sesion</button>
        <a type="submit" class="btn btn-color1 btn-secondary btn-block btn-short" href="/admin">Registrarse</a>

    </form>
</div>