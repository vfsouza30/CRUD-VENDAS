window.fetchAddress = function() {
    const cep = document.getElementById('cep').value;
    const baseUrl = import.meta.env.VITE_APP_URL;
    const url = `${baseUrl}/api/consulta-cep`;
    const cepErrorElement = document.getElementById('cep-error');

    cepErrorElement.innerText = '';
    cepErrorElement.style.display = 'none';

    axios.post(url, { cep: cep })
        .then(response => {
            const data = response.data;

            if (data.erro) {
                cepErrorElement.innerHTML = 'CEP não encontrado ou inválido.';
                cepErrorElement.style.display = 'block';
            } else {
                document.getElementById('endereco').value = data.logradouro || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('cidade').value = data.localidade || '';
                cepErrorElement.style.display = 'none';
            }
        })
        .catch(error => {      
            cepErrorElement.innerHTML = 'Erro ao consultar o CEP.';
            cepErrorElement.style.display = 'block';
        });
}
