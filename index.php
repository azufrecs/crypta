<?php
require("encriptar.php")
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="assets/img/favicon.svg">
	<title>Crypta</title>

	<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/fork-awesome.min.css">
	<link href="assets/css/main.css" rel="stylesheet" media="screen">
	<link href="assets/css/signin.css" rel="stylesheet" media="screen">
	<link href="assets/css/line-awesome.css" rel="stylesheet" media="screen">
	<style>
		body {
			padding-top: 0px;
		}
	</style>

	<script src="assets/js/jquery-3.6.0.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		/* EVITAR REENVIO DE DATOS */
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
	</script>
</head>

<body>
	<div class="container">
		<!-- Modal -->
		<div class="modal fade" id="ModalEncriptar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalEncriptar" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-danger">
						<div align="left"><span class="text-white display-6"><i class="las la-fingerprint"></i>&nbsp;Encriptar contraseña</span></div>
					</div>

					<div class="modal-body">
						<form action="">
							<div class="form-floating mb-2">
								<input type="password" maxlength="40" class="form-control border-danger-50" name="txtPass" id="password" placeholder="Contrase&ntilde;a" autocomplete="on">
								<label class="text-secondary" for="txtPass">Contrase&ntilde;a</label>
							</div>
							<div class="form-floating mb-2">
								<textarea id="encrypted-password" name="txtPassEncrypt" class="form-control border-danger-50" style="text-align: justify;" placeholder="Contrase&ntilde;a encriptada" autocomplete="off"></textarea>
								<label class="text-secondary" for="txtPassEncrypt">Contrase&ntilde;a encriptada</label>
							</div>
							<div class="modal-footer">
								<button type="button" id="copiar" class="btn btn-primary" title="Copiar contrase&ntilde;a encriptada"><i class='las la-copy'></i></button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div align="center">
			<h1 class="text-dark display-1">Crypta</h1>
			<h2 class="text-secondary" style="margin-bottom: 80px;">Generaci&oacute;n de Matrices y Encriptaci&oacute;n Contrase&ntilde;as</h2>
			<div class="row justify-content-center">
				<div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 col-xxl-4" align="center">
					<button type="button" id="generar-excel" class="btn btn-primary btn-lg w-100 mb-1">
						<br><i class='las la-10x la-th'></i>
						<div class="mt-2 mb-4">Generar Matriz</div>
					</button>
				</div>

				<div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 col-xxl-4" align="center">
					<button type="button" class="btn btn-primary btn-lg w-100 mb-1" data-bs-toggle="modal" data-bs-target="#ModalEncriptar">
						<br><i class='las la-10x la-fingerprint'></i>
						<div class="mt-2 mb-4">Encriptar Contrase&ntilde;a</div>
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="fixed-bottom row justify-content-center" align='center'>
		<div class='col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2'>
			<a class='btn btn-sm btn-outline-primary border-0 px-5 mb-1' href='https://www.acs.nat.cu' target="_blank" title=" AZUfre, Computer Solutions" role='button'>AZUfre, CS</a>
		</div>
	</div>

	<script>
		/** PONE EL FOCO EN EL INPUT TEXT DEFINIDO DENTRO DEL MODAL */
		$(document).ready(function() {
			$('#ModalEncriptar').on('shown.bs.modal', function() {
				$('#password').focus();
			});
		});

		/** FUNCION PARA AJUSTAR LA ALTURA DEL TEXTAREA */
		function adjustTextareaHeight(textareaId) {
			var textarea = $('#' + textareaId);
			if (!textarea.is(':empty')) { // Verifica si el textarea no está vacío
				var lineHeight = parseFloat(textarea.css('line-height'));
				var padding = parseInt(textarea.css('padding-top'), 10) + parseInt(textarea.css('padding-bottom'), 10);
				var height = lineHeight * (textarea.val().split('\n').length - 1) + padding;
				textarea.height(height); // Aplica la nueva altura
			} else {
				textarea.height('auto'); // Restablece la altura a auto si está vacío
			}
		}

		/** LLAMA A LA FUNCIÓN CADA VEZ QUE EL CONTENIDO DEL TEXTAREA CAMBIA */
		$('#encrypted-password').on('input', function() {
			adjustTextareaHeight('encrypted-password');
		});

		/** AJUSTA LA ALTURA INICIALMENTE */
		adjustTextareaHeight('encrypted-password');

		/** LIMPIA EL TEXTAREA AL INICIAR */
		$('#ModalEncriptar').on('show.bs.modal', function() {
			$('#encrypted-password').val('');
		});

		/** ENCRIPTA LA CONTRASENNA MIENTRAS SE ESCRIBE */
		$(document).ready(function() {
			$('#password').on('keyup', function() {
				var password = $(this).val();
				if (password === '') {
					$('#encrypted-password').val('');
				} else {
					var secretKey = '<?php echo $CLAVE_SECRETA; ?>';
					$.ajax({
						type: 'POST',
						url: 'encriptar.php',
						data: {
							password: password,
							secretKey: secretKey
						},
						success: function(response) {
							$('#encrypted-password').val(response);
						}
					});
				}
			});
		});

		/** EJECUTANDO FICHERO PHP */
		$('#generar-excel').on('click', function() {
			window.location.href = 'exportar.php';
		});

		/** PROCEDIMIENTO PARA COPIAR EL CONTENIDO DEL TEXTAREA */
		/** SELECCIONA EL BOTÓN CON ID "COPIAR" */
		const copiarButton = document.getElementById('copiar');
		/** AGREGA UN EVENTO CLICK AL BOTON */
		copiarButton.addEventListener('click', () => {
			/** SELECCIONA EL INPUT CON ID "ENCRYPTED-PASSWORD" */
			const encryptedPasswordInput = document.getElementById('encrypted-password');
			/** COPIA EL VALOR DEL INPUT AL PORTAPAPELES */
			navigator.clipboard.writeText(encryptedPasswordInput.value);
		});
	</script>
</body>

</html>