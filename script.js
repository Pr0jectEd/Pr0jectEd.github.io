document.addEventListener('DOMContentLoaded', (event) => {
/*Creaciónd de Variables Modificables*/
    /*Musée de L'inquisition*/
    let valorFijo = 0;
    let contadorSumas11 = 0;
    let contadorSumas950 = 0;
    let contadorSumasEtudiant=0;
    let contadorSumasEnfant=0;
    /*Maison Hantée*/
    let valorFijoMH = 0;
    let contadorSumasMH=0;
    let contadorSumasMHEsp=0;
    /*Pack Promo*/
    let valorFijoPromo=0;
    let contadorSumasPromoAdult=0;
    let contadorSumasPromoEtudiant=0;
    let contadorSumasPromoEnfant=0;

/*Creación de las variables constantes (Contadores)*/
    /*Musée de L'inquisition*/
    const resultadoElement = document.getElementById('resultado');
    const contadorElement11 = document.getElementById('contador11');
    const contadorElement950 = document.getElementById('contador950');
    const contadorElementEnfant = document.getElementById('contadorEnfant'); 
    const contadorElementEtudiant = document.getElementById('contadorEtudiant');
    /*Maison Hantée*/ 
    const resultadoElementMH = document.getElementById('resultadoMH');
    const contadorElementMH = document.getElementById("contadorMH");
    const contadorElementMHEsp = document.getElementById("contadorMHEsp");
    /*Pack Promo*/
    const resultadoElementPromo = document.getElementById('resultadoPromo');
    const contadorElementPromoAdult = document.getElementById('contadorPromoAdult');
    const contadorElementPromoEtudiant = document.getElementById('contadorPromoEtudiant');
    const contadorElementPromoEnfant = document.getElementById('contadorPromoEnfant');


/*Creación de las variables constantes (Métodos)*/
    /*Musée de L'inquisition*/
    const sumaBtn11 = document.getElementById('sumaBtn11');
    const resetBtn11 = document.getElementById('resetBtn11');
    const sumaBtn950 = document.getElementById('sumaBtn950');
    const resetBtn950 = document.getElementById('resetBtn950');
    const sumaBtnEnfant = document.getElementById('sumaBtnEnfant');
    const resetBtnEnfant = document.getElementById('resetBtnEnfant');
    const sumaBtnEtudiant = document.getElementById('sumaBtnEtudiant');
    const resetBtnEtudiant = document.getElementById('resetBtnEtudiant');
    /*Maison Hantée*/ 
    const sumaBtnMH = document.getElementById('sumaBtnMH');
    const resetBtnMH = document.getElementById('resetBtnMH');
    const sumaBtnMHEsp = document.getElementById('sumaBtnMHEsp');
    const resetBtnMHEsp = document.getElementById('resetBtnMHEsp');
    /*Pack Promo*/
    const sumaBtnPromoAdult = document.getElementById('sumaBtnPromoAdult');
    const resetBtnPromoAdult = document.getElementById('resetBtnPromoAdult');
    const sumaBtnPromoEtudiant = document.getElementById('sumaBtnPromoEtudiant');
    const resetBtnPromoEtudiant = document.getElementById('resetBtnPromoEtudiant');
    const sumaBtnPromoEnfant = document.getElementById('sumaBtnPromoEnfant');
    const resetBtnPromoEnfant= document.getElementById('resetBtnPromoEnfant');
    
     
/*Creación de los métodos)*/
    /*Musée de l'inquisition*/
    sumaBtn11.addEventListener('click', () => {
        valorFijo += 11;
        contadorSumas11 += 1;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElement11.textContent = contadorSumas11;
    });

    resetBtn11.addEventListener('click', () => {
        valorFijo = valorFijo-(11*contadorSumas11);
        contadorSumas11 = 0;        
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElement11.textContent = contadorSumas11;
    });

    sumaBtn950.addEventListener('click', () => {
        valorFijo += 9.50;
        contadorSumas950 += 1;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElement950.textContent = contadorSumas950;
    });

    resetBtn950.addEventListener('click', () => {
        valorFijo = valorFijo-(9.50*contadorSumas950);;
        contadorSumas950 = 0;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElement950.textContent = contadorSumas950;
    });

    sumaBtnEnfant.addEventListener('click', () => {
        valorFijo += 8.50;
        contadorSumasEnfant += 1;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElementEnfant.textContent = contadorSumasEnfant;
    });

    resetBtnEnfant.addEventListener('click', () => {
        valorFijo = valorFijo -(8.50*contadorSumasEnfant);;;
        contadorSumasEnfant = 0;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElementEnfant.textContent = contadorSumasEnfant;
    });

    sumaBtnEtudiant.addEventListener('click', () => {
        valorFijo += 9.50;
        contadorSumasEtudiant += 1;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElementEtudiant.textContent = contadorSumasEtudiant;
    });

    resetBtnEtudiant.addEventListener('click', () => {
        valorFijo = valorFijo -(9.50*contadorSumasEtudiant);;;
        contadorSumasEtudiant = 0;
        resultadoElement.textContent = valorFijo.toFixed(2);
        contadorElementEtudiant.textContent = contadorSumasEtudiant;
    });
    /*Maison Hantée*/

    sumaBtnMH.addEventListener('click', () => {
        valorFijoMH += 10;
        contadorSumasMH += 1;
        resultadoElementMH.textContent = valorFijoMH.toFixed(2);
        contadorElementMH.textContent = contadorSumasMH;
    });

    resetBtnMH.addEventListener('click', () =>{
        valorFijoMH = valorFijoMH -(10*contadorSumasMH);;;
        contadorSumasMH = 0;
        resultadoElementMH.textContent = valorFijoMH.toFixed(2);
        contadorElementMH.textContent =contadorSumasMH;
    });

    sumaBtnMHEsp.addEventListener('click', () => {
        valorFijoMH += 15;
        contadorSumasMHEsp += 1;
        resultadoElementMH.textContent = valorFijoMH.toFixed(2);
        contadorElementMHEsp.textContent = contadorSumasMHEsp;
    });

    resetBtnMHEsp.addEventListener('click', () =>{
        valorFijoMH = valorFijoMH -(15*contadorSumasMHEsp);;;
        contadorSumasMHEsp = 0;
        resultadoElementMH.textContent = valorFijoMH.toFixed(2);
        contadorElementMHEsp.textContent =contadorSumasMHEsp;
    });

    /*Pack Promo*/

    sumaBtnPromoAdult.addEventListener('click', () => {
        valorFijoPromo += 19;
        contadorSumasPromoAdult += 1;
        resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
        contadorElementPromoAdult.textContent = contadorSumasPromoAdult;
    });

    resetBtnPromoAdult.addEventListener('click', () => { 
        valorFijoPromo = valorFijoPromo - (19*contadorSumasPromoAdult);
        contadorSumasPromoAdult =0;
        resultadoElementPromo.textContent =valorFijoPromo.toFixed(2);
        contadorElementPromoAdult.textContent = contadorSumasPromoAdult;
    });

    sumaBtnPromoEtudiant.addEventListener('click', () => {
        valorFijoPromo += 17;
        contadorSumasPromoEtudiant += 1;
        resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
        contadorElementPromoEtudiant.textContent = contadorSumasPromoEtudiant;
    });

    resetBtnPromoEtudiant.addEventListener('click', () => {
        valorFijoPromo = valorFijoPromo-(17*contadorSumasPromoEtudiant);
        contadorSumasPromoEtudiant = 0;        
        resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
        contadorElementPromoEtudiant.textContent = contadorSumasPromoEtudiant;
    });

    sumaBtnPromoEnfant.addEventListener('click', () => {
        valorFijoPromo += 16;
        contadorSumasPromoEnfant += 1;
        resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
        contadorElementPromoEnfant.textContent = contadorSumasPromoEnfant;
    });

    resetBtnPromoEnfant.addEventListener('click', () => {
        valorFijoPromo = valorFijoPromo -(16*contadorSumasPromoEnfant);
        contadorSumasPromoEnfant = 0;        
        resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
        contadorElementPromoEnfant.textContent = contadorSumasPromoEnfant;
    });



});