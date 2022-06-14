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

    var img_01 = document.getElementById('img_01')
    var img_02 = document.getElementById('img_02')
    var img_03 = document.getElementById('img_03')
 
    var nrp = nrp.id

    var nrpAdicionar = document.getElementById('nrp')
    nrpAdicionar.removeAttribute('value')
    nrpAdicionar.setAttribute('value', nrp)
    //console.log(nrp)
    $.ajax({
        url: 'http://conferencia.app.com.br/ajax',
        method: 'POST',
        data: {nr_paragrafo: nrp},
        dataType : 'json'
    }).done(function(result){
        var url_01 = result[0][0].img_01
        var url_02 = result[0][0].img_02
        var url_03 = result[0][0].img_03

        p.innerHTML = result[0][0].paragrafo
        t.innerHTML = result[0][0].titulo 
        img_01.innerText = " "
        img_02.innerText = " "
        img_03.innerText = " "

        if(result[0][0].img_01 !== null) {
            img_01.innerText = "Imagem 01"
            img_01.setAttribute('href', `http://conferencia.app.com.br/img_caderno/${url_01}`)
        }
        if(result[0][0].img_02 !== null) {
            img_02.innerText = "Imagem 02"
            img_02.setAttribute('href', `http://conferencia.app.com.br/img_caderno/${url_02}`)
        }
        if(result[0][0].img_03 !== null) {
            img_03.innerText = "Imagem 03"
            img_03.setAttribute('href', `http://conferencia.app.com.br/img_caderno/${url_03}`)
        }


        var tbody = document.getElementById('tbody')
        tbody.innerText = ''

        for(let i=0; i<result[1].length ; i++) {
            let tr = tbody.insertRow()
        
            let td_emendas = tr.insertCell()
            let td_pala_inicio = tr.insertCell()
            let td_tipo = tr.insertCell()
            let td_nome = tr.insertCell()
            let td_nucleo = tr.insertCell()

            td_emendas.innerHTML = result[1][i].emendas
            td_pala_inicio.innerHTML = result[1][i].pala_inicio
            td_tipo.innerHTML = result[1][i].descri
            td_nome.innerHTML = result[1][i].nome
            td_nucleo.innerHTML = result[1][i].nucleo
        }

        var minhaLista = document.getElementById('emendas_list')
        minhaLista.innerText = ''

        for(let i=0; i<result[1].length ; i++) {
            var el = document.createElement('li')
            
            el.innerText = `Emendas(${i+1}): ${result[1][i].emendas}\n
                            Após a expressão(${i+1}): ${result[1][i].pala_inicio}\n
                            Tipo(${i+1}): ${result[1][i].descri}\n
                            Nome(${i+1}): ${result[1][i].nome}\n
                            Núcleo(${i+1}): ${result[1][i].nucleo}`
            el.setAttribute('class', 'list-group-item')

            minhaLista.appendChild(el)
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
        textoAdicionar.innerText = "Texto a adicionar:"
        textoSuprimir.removeAttribute('disabled')
    }else {
        textoAdicionar.innerText = " "
        textoSuprimir.removeAttribute('disabled')
    }
}