/*document.querySelectorAll('input[name="cnpj"]').forEach(function(cnpjInput) {
    cnpjInput.addEventListener('blur', function() {
        cnpjInput.value = cnpjInput.value.replace(/\D/g, '');
        const cnpjError = cnpjInput.nextElementSibling;
        if (cnpjInput.value.length !== 14) {
            cnpjError.style.display = 'block';
        } else {
            cnpjError.style.display = 'none';
        }
    });
});*/

document.querySelectorAll('input[name="cnpj"]').forEach(function(cnpjInput) {
    cnpjInput.addEventListener('blur', function() {
        var b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        var c = cnpjInput.value.replace(/\D/g, '');
        var errorMessage = '';
        
        if (c.length !== 14) {
            errorMessage = 'CNPJ inválido';
        } else if (/0{14}/.test(c)) {
            errorMessage = 'CNPJ inválido';
        } else {
            for (var i = 0, n = 0; i < 12; n += c[i] * b[++i]);
            if (c[12] != (((n %= 11) < 2) ? 0 : 11 - n)) {
                errorMessage = 'CNPJ inválido';
            }

            for (var i = 0, n = 0; i <= 12; n += c[i] * b[i++]);
            if (c[13] != (((n %= 11) < 2) ? 0 : 11 - n)) {
                errorMessage = 'CNPJ inválido';
            }
        }

        var errorElement = document.getElementById('cnpj-error');
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