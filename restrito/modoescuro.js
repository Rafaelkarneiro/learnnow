const button = document.getElementById('botao')
const body = document.getElementsByTagName('body')[0]
const ModoNoturno = 'dark-mode'

button.addEventListener('click', Mudar)

function Mudar(){
    AlterarElemento()
    AlterarTexto()
}

function AlterarElemento(){
    button.classList.toggle(ModoNoturno)
    body.classList.toggle(ModoNoturno)
}

function AlterarTexto(){
    const modoNoite = 'Ativar modo escuro'
    const modoClaro = 'Ativar modo Claro'

    if(button.classList.contains(ModoNoturno)){
        button.innerHTML = modoClaro
        return
    }else{
        button.innerHTML = modoNoite
        return
    }
}