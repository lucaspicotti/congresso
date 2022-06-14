function sendP(nrp) {  
    
    let xhr = new XMLHttpRequest()
    var documento = nrp.id

    xhr.respondeType = "json"
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4){
            console.log(xhr)
        }else{
            
        }
    }

    xhr.open("POST", "http://appcongresso.com.br/ajax")
    xhr.send(documento)
}