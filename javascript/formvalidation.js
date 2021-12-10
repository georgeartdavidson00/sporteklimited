//VALIDATION FOR NAME 
const pname = document.getElementById('pname');
const perroMsg = document.getElementById('perror');

const validatePname = (e) =>{

    const fullnamereg = /^[a-zA-Z ]*$/;

    const testNameReg = fullnamereg.test(pname.value);

    if(!pname.value){
        perroMsg.style.color="red";
        perroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        perroMsg.style.color="red";
        perroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        perroMsg.style.color="";
        perroMsg.innerText = "";
    }
}

//VALIDATION FOR NATIONALITY
const nationality = document.getElementById('nationality');
const nerroMsg = document.getElementById('nerror');

const validateN = (e) =>{

    const fullnamereg = /^[a-zA-Z ]*$/;

    const testNameReg = fullnamereg.test(nationality.value);

    if(!nationality.value){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        nerroMsg.style.color="red";
        nerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        nerroMsg.style.color="";
        nerroMsg.innerText = "";
    }
}

//VALIDATION FOR EMAIL
const email = document.getElementById('email');
const emailerroMsg = document.getElementById('emailerror');

const validateE = (e) =>{

    const fullnamereg = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;

    const testNameReg = fullnamereg.test(email.value);

    if(!email.value){
        emailerroMsg.style.color="red";
        emailerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        emailerroMsg.style.color="red";
        emailerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        emailerroMsg.style.color="";
        emailerroMsg.innerText = "";
    }
}


//VALIDATION FOR TELEPHONE
const telephone = document.getElementById('telephone');
const terroMsg = document.getElementById('terror');

const validateT = (e) =>{

    const fullnamereg = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

    const testNameReg = fullnamereg.test(telephone.value);

    if(!telephone.value){
        terroMsg.style.color="red";
        terroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        terroMsg.style.color="red";
        terroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        terroMsg.style.color="";
        terroMsg.innerText = "";
    }
}
//VALIDATION FOR CONTRACT-TERM
const contractterm = document.getElementById('contractterm');
const cterroMsg = document.getElementById('cterror');

const validateCT=(e) =>{

    const fullnamereg = /^[a-zA-Z-\s]*$/;

    const testNameReg = fullnamereg.test(contractterm.value);

    if(!contractterm.value){
        cterroMsg.style.color="red";
        cterroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        cterroMsg.style.color="red";
        cterroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        cterroMsg.style.color="";
        cterroMsg.innerText = "";
    }
}

//VALIDATION FOR PLAYER AGENT 
const playeragent = document.getElementById('playeragent');
const paerroMsg = document.getElementById('paerror');

const validatePA=(e) =>{

    const fullnamereg = /^[a-zA-Z ]*$/;

    const testNameReg = fullnamereg.test(playeragent.value);

    if(!playeragent.value){
        paerroMsg.style.color="red";
        paerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        paerroMsg.style.color="red";
        paerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        paerroMsg.style.color="";
        paerroMsg.innerText = "";
    }
}

//VALIDATION FOR BOOTS
const boottype = document.getElementById('boottype');
const bterroMsg = document.getElementById('bterror');

const validateBT=(e) =>{

    const fullnamereg = /^[a-zA-Z ]*$/;

    const testNameReg = fullnamereg.test(boottype.value);

    if(!boottype.value){
        bterroMsg.style.color="red";
        bterroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        bterroMsg.style.color="red";
        bterroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        bterroMsg.style.color="";
        bterroMsg.innerText = "";
    }
}


//VALIDATION FOR PLAYER POSITION
const playerposition = document.getElementById('playerposition');
const poerroMsg = document.getElementById('poerror');

const validatePOS=(e) =>{

    const fullnamereg = /^[a-zA-Z-\s]*$/;

    const testNameReg = fullnamereg.test(playerposition.value);

    if(!playerposition.value){
        poerroMsg.style.color="red";
        poerroMsg.innerText = "Field cannot be empty";
        e.preventDefault();
    }
    else if(!testNameReg){
        poerroMsg.style.color="red";
        poerroMsg.innerText = "wrong input";
        e.preventDefault();
    }
    else{
        poerroMsg.style.color="";
        poerroMsg.innerText = "";
    }
}


