//Para validar los campos llenados en Contacto
document.getElementById('miFormulario').addEventListener('submit', function(event) {
    // Funciones para mostrar y borrar mensajes de error
    function showError(field, errorElement, errorMessage) {
        errorElement.innerHTML = errorMessage;
        field.classList.add('is-invalid'); // Agrega una clase para resaltar el campo con error
        event.preventDefault();
    }

    function clearError(field, errorElement) {
        errorElement.innerHTML = '';
        field.classList.remove('is-invalid');
    }

    // Validar el campo 'name'
    var nameField = document.getElementById('name');
    var errorName = document.getElementById('errorName');
    if (!nameField.value.trim()) {
        showError(nameField, errorName, 'Por favor, ingresa tu nombre.');
    } else if (!/^[a-zA-Z ]+$/.test(nameField.value.trim())) {
        showError(nameField, errorName, 'El formato del campo nombre no es válido. Solo se permiten letras y espacios.');
    } else {
        clearError(nameField, errorName);
    }

    // Validar el campo 'lastname'
    var lastnameField = document.getElementById('lastname');
    var errorLastname = document.getElementById('errorLastname');
    if (!lastnameField.value.trim()) {
        showError(lastnameField, errorLastname, 'Por favor, ingresa tu apellido.');
    } else if (!/^[a-zA-Z ]+$/.test(lastnameField.value.trim())) {
        showError(lastnameField, errorLastname, 'El formato del campo apellido no es válido. Solo se permiten letras y espacios.');
    } else {
        clearError(lastnameField, errorLastname);
    }

    // Validar el campo 'email'
    var emailField = document.getElementById('email');
    var errorEmail = document.getElementById('errorEmail');
    if (!emailField.value.trim()) {
        showError(emailField, errorEmail, 'Por favor, ingresa tu correo electrónico.');
    } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailField.value.trim())) {
        showError(emailField, errorEmail, 'El formato del campo correo electrónico no es válido.');
    } else {
        clearError(emailField, errorEmail);
    }

    // Validar el campo 'affair'
    var affairField = document.getElementById('affair');
    var errorAffair = document.getElementById('errorAffair');
    if (!affairField.value.trim()) {
        showError(affairField, errorAffair, 'Por favor, ingresa el asunto.');
    } else if (!/^[a-zA-Z ]+$/.test(affairField.value.trim())) {
        showError(affairField, errorAffair, 'El formato del campo asunto no es válido. Solo se permiten letras y espacios.');
    } else {
        clearError(affairField, errorAffair);
    }

    // Validar el campo 'message'
    var messageField = document.getElementById('message');
    var errorMessage = document.getElementById('errorMessage');
    if (!messageField.value.trim()) {
        showError(messageField, errorMessage, 'Por favor, ingresa tu mensaje.');
    } else {
        clearError(messageField, errorMessage);
    }

});