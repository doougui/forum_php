$(document).ready(function() {
	$('#topic').submit(function() {
		const title = $('#title').val();
		const forum = $('#forum').val();
		const text = $('#editor').val();
		
		$.ajax({
			url: DIRPAGE + 'ajax/newTopic',
			type: 'POST',
			data: {
				title: title,
				forum: forum,
				text: text
			},
			beforeSend: function() {
				$('button[type=submit]').attr('disabled', '');
			}
		}).done(function(response) {
			if (response.length != 0) {
				$('.error-msg').html(response).fadeIn();
			} else {
				alert('Tópico criado com sucesso!');
				window.location.href = DIRPAGE;
			}
		}).fail(function() {
			alert('Ops! Algo de errado aconteceu!');
		}).always(function() {
			$('button[type=submit]').removeAttr('disabled');
		});

		return false;
	});

	$('#edit-topic').submit(function() {
		const id = $('#id').val();
		const title = $('#title').val();
		const forum = $('#forum').val();
		const text = $('#editor').val();
		
		$.ajax({
			url: DIRPAGE + 'ajax/editTopic',
			type: 'POST',
			data: {
				id: id,
				title: title,
				forum: forum,
				text: text
			},
			beforeSend: function() {
				$('button[type=submit]').attr('disabled', '');
			}
		}).done(function(response) {
			if (response.length != 0) {
				$('.error-msg').html(response).fadeIn();
			} else {
				alert('Tópico editado com sucesso!');
				window.location.href = DIRPAGE;
			}
		}).fail(function() {
			alert('Ops! Algo de errado aconteceu!');
		}).always(function() {
			$('button[type=submit]').removeAttr('disabled');
		});

		return false;
	});

	$('#register').submit(function() {
		const name = $('#name').val();
		const email = $('#email').val();
		const password = $('#password').val();
		const sex = $('#sex').val();

		$.ajax({
			url: DIRPAGE + 'ajax/register',
			type: 'POST',
			data: {
				name: name,
				email: email,
				password: password,
				sex: sex
			},
			beforeSend: function() {
				$('button[type=submit]').attr('disabled', '');
			}
		}).done(function(response) {
			if (response.length != 0) {
				$('.error-msg').html(response).fadeIn();
			} else {
				window.location.href = DIRPAGE;
			}
		}).fail(function() {
			alert('Ops! Algo de errado aconteceu!');
		}).always(function() {
			$('button[type=submit]').removeAttr('disabled');
		});

		return false;
	});

	$('#login').submit(function() {
		const email = $('#email').val();
		const password = $('#password').val();

		$.ajax({
			url: DIRPAGE + 'ajax/login',
			type: 'POST',
			data: {
				email: email,
				password: password
			},
			beforeSend: function() {
				$('button[type=submit]').attr('disabled', '');
			}
		}).done(function(response) {
			if (response.length != 0) {
				$('.error-msg').html(response).fadeIn();
			} else {
				window.location.href = DIRPAGE;
			}
		}).fail(function() {
			alert('Ops! Algo de errado aconteceu!');
		}).always(function() {
			$('button[type=submit]').removeAttr('disabled');
		});

		return false;
	});
 
	$('#edit-user').submit(function() {
		const user_id = $('#id').val();
		const name = $('#name').val();
		const email = $('#email').val();
		const password = $('#password').val();
		const sex = $('#sex').val();

		$.ajax({
			url: DIRPAGE + 'ajax/editUser',
			type: 'POST',
			data: {
				id: user_id,
				name: name,
				email: email,
				password: password,
				sex: sex
			},
			beforeSend: function() {
				$('button[type=submit]').attr('disabled', '');
			}
		}).done(function(response) {
			if (response.length != 0) {
				$('.error-msg').html(response).fadeIn();
			} else {
				alert('Informações alteradas com sucesso! Entre novamente para atualizar suas informações');
				window.location.href = DIRPAGE + 'login';
			}
		}).fail(function() {
			alert('Ops! Algo de errado aconteceu!');
		}).always(function() {
			$('button[type=submit]').removeAttr('disabled');
		});

		return false;
	});
});