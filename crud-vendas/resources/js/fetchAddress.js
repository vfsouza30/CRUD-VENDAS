window.fetchAddress = function() {
    const cep = document.getElementById('cep').value;
    const baseUrl = import.meta.env.VITE_APP_URL;
    const url = `${baseUrl}/api/consulta-cep`;
     document.getElementById('cep-error').innerText = '';

    
    axios.post(url, { cep: cep })
        .then(response => {
            const data = response.data;
            if(data.erro){
                document.getElementById('cep-error-api').innerText = 'CEP não encontrado ou inválido.';
            } else {
                document.getElementById('endereco').value = data.logradouro || '';
                document.getElementById('bairro').value = data.bairro || '';
                document.getElementById('cidade').value = data.localidade || '';
            }
            
        })
        .catch(error => {
            console.error(error);
            document.getElementById('cep-error-api').innerText = 'CEP não encontrado ou inválido.';
        });
}