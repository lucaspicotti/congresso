//Máscara do input telefone
const tel = document.getElementById('celular') // Seletor do campo de telefone

tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

const mascaraTelefone = (valor) => {
    valor = valor.replace(/\D/g, "")
    valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
    valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
    tel.value = valor // Insere o(s) valor(es) no campo
}

//Controle do Ajax enviado pelo menu de emendas
function sendP(nrp) {
    var p = document.getElementById('paragrafo')
    var t = document.getElementById('titulo')
    var nrp = nrp.id

    var nrpAdicionar = document.getElementById('nrp')
    nrpAdicionar.removeAttribute('value')
    nrpAdicionar.setAttribute('value', nrp)
    //console.log(nrp)
    $.ajax({
        url: 'http://appcongresso.com.br/ajax',
        method: 'POST',
        data: {nr_paragrafo: nrp},
        dataType : 'json'
    }).done(function(result){
        console.log(result)
        p.innerHTML = result[0][0].paragrafo
        t.innerHTML = result[0][0].titulo

        let tbody = document.getElementById('tbody')
        tbody.innerText = ''

        for(let i=0; i<result[1].length ; i++) {
            let tr = tbody.insertRow()
        
            let td_emendas = tr.insertCell()
            let td_pala_inicio = tr.insertCell()
            let td_tipo = tr.insertCell()
            let td_nome = tr.insertCell()
            let td_nucleo = tr.insertCell()

            td_emendas.innerText = result[1][i].emendas
            td_pala_inicio.innerText = result[1][i].pala_inicio
            td_tipo.innerText = result[1][i].descri
            td_nome.innerText = result[1][i].nome
            td_nucleo.innerText = result[1][i].nucleo
        }
    })
}

//Controle do tipo de emenda do formulário
function suprimir(tipo) {
    var textoAdicionar = document.getElementById('textoAdicionar')
    var textoSuprimir = document.getElementById('textoSuprimir')
    var tipoEmenda = tipo.value

    console.log(textoAdicionar)
    if(tipoEmenda == 9) {
        textoAdicionar.innerText = "Texto a adicionar:"
        textoSuprimir.setAttribute('disabled', '')
    }else if(tipoEmenda == 10) {
        textoAdicionar.innerText = "Texto a suprimir:"
        textoSuprimir.setAttribute('disabled', '')
    }else if(tipoEmenda == 11) {
        textoSuprimir.removeAttribute('disabled')
    }else {
        textoAdicionar.innerText = " "
        textoSuprimir.removeAttribute('disabled')
    }
}