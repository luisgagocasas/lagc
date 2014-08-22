// JavaScript Document
function revisar_form() {
	if(frmcncontac.usuario.value.length < 4) { alert('Escribe un nombre de usuario.') ; return false ; }
	if(frmcncontac.email.value.length < 4) { alert('Excribe un correo Electronico.') ; return false ; }
	if(frmcncontac.contrasenia.value.length < 4) { alert('Excribe la Contraseña.') ; return false ; }
	if(frmcncontac.nombre.value.length < 4) { alert('Excribe un Nombre.') ; return false ; }
	if(frmcncontac.apellidos.value.length < 4) { alert('Excribe un Apellido.') ; return false ; }
}