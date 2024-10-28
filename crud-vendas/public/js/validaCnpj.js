document.querySelectorAll('input[name="cnpj"]').forEach(function(cnpjInput) {
    cnpjInput.addEventListener('blur', function() {
        cnpjInput.value = cnpjInput.value.replace(/\D/g, '');
        const cnpjError = cnpjInput.nextElementSibling;
        if (cnpjInput.value.length !== 14) {
            cnpjError.style.display = 'block';
        } else {
            cnpjError.style.display = 'none';
        }
    });
});