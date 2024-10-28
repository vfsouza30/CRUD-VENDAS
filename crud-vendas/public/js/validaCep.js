document.querySelectorAll('input[name="cep"]').forEach(function(cepInput) {
    cepInput.addEventListener('blur', function() {
        cepInput.value = cepInput.value.replace(/\D/g, '');
        const cepError = cepInput.nextElementSibling;
        if (cepInput.value.length !== 8) {
            cepError.style.display = 'block';
        } else {
            cepError.style.display = 'none';
        }
    });
});