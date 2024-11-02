/*document.querySelectorAll('input[name="cpf"]').forEach(function(cpfInput) {
    cpfInput.addEventListener('blur', function() {
        cpfInput.value = cpfInput.value.replace(/\D/g, '');
        const cpfError = cpfInput.nextElementSibling;
        if (cpfInput.value.length !== 11) {
            cpfError.style.display = 'block';
        } else {
            cpfError.style.display = 'none';
        }
    });
});*/


document.querySelectorAll('input[name="cpf"]').forEach(function(cpfInput) {
    cpfInput.addEventListener('blur', function() {
        var c = cpfInput.value.replace(/\D/g, '');
        var errorMessage = '';

        // Verifica se o CPF possui 11 dígitos ou se é uma sequência de números repetidos
        if (c.length !== 11 || /^(\d)\1{10}$/.test(c)) {
            errorMessage = 'CPF inválido';   
        }

        // Calcula o primeiro dígito verificador
        let sum = 0;
        for (let i = 0; i < 9; i++) {
            sum += parseInt(c.charAt(i)) * (10 - i);
        }
        let firstVerifier = (sum * 10) % 11;
        if (firstVerifier === 10) firstVerifier = 0;

        if (parseInt(c.charAt(9)) !== firstVerifier) {
            errorMessage = 'CPF inválido';
        }

        // Calcula o segundo dígito verificador
        sum = 0;
        for (let i = 0; i < 10; i++) {
            sum += parseInt(c.charAt(i)) * (11 - i);
        }
        let secondVerifier = (sum * 10) % 11;
        if (secondVerifier === 10) secondVerifier = 0;

        if (parseInt(c.charAt(10)) !== secondVerifier) {
            errorMessage = 'CPF inválido';
        }

        var errorElement = document.getElementById('cpf-error');
        if (errorMessage) {
            errorElement.style.display = 'block';
            errorElement.innerHTML = errorMessage;

        } else {
            errorElement.style.display = 'none';
            errorElement.innerHTML = ''; 
        }

        var submitButton = document.querySelector('button[type="submit"].btn.btn-primary');
        submitButton.disabled = errorMessage ? true : false;
    });
});
