<form method='post'>
	<div class='row'>
		<div class='input-field col s12 m6 offset-m3'>
			<i class='material-icons prefix'>person_pin</i>
			<input id='alias' type='text' name='alias' class='validate' value='' required/>
	    	<label for='alias'>Usuario</label>
		</div>
		<div class='input-field col s12 m6 offset-m3'>
			<i class='material-icons prefix'>security</i>
			<input id='clave' type='password' name='clave' class="validate" value='' required/>
			<label for='clave'>Contraseña</label>
		</div>
	</div>
	<div class='row center-align'>
		<button type='submit' name='iniciar' class='btn waves-effect color1'><i class='material-icons'>send</i></button>
	</div>
</form>