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

        /*Resultado Global*/
        const resultadoGlobalElement = document.getElementById('resultadoGlobal');

        function actualizarResultadoGlobal() {
            const resultadoGlobal = valorFijo + valorFijoMH + valorFijoPromo;
            resultadoGlobalElement.textContent = resultadoGlobal.toFixed(2);
        }
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
        const resetBtnMusee = document.getElementById('resetBtnMusee')
        /*Maison Hantée*/ 
        const sumaBtnMH = document.getElementById('sumaBtnMH');
        const resetBtnMH = document.getElementById('resetBtnMH');
        const sumaBtnMHEsp = document.getElementById('sumaBtnMHEsp');
        const resetBtnMHEsp = document.getElementById('resetBtnMHEsp');
        const resetBtnMaison = document.getElementById('resetBtnMaison')
        /*Pack Promo*/
        const sumaBtnPromoAdult = document.getElementById('sumaBtnPromoAdult');
        const resetBtnPromoAdult = document.getElementById('resetBtnPromoAdult');
        const sumaBtnPromoEtudiant = document.getElementById('sumaBtnPromoEtudiant');
        const resetBtnPromoEtudiant = document.getElementById('resetBtnPromoEtudiant');
        const sumaBtnPromoEnfant = document.getElementById('sumaBtnPromoEnfant');
        const resetBtnPromoEnfant= document.getElementById('resetBtnPromoEnfant');
        const resetBtnPack = document.getElementById('resetBtnPack')
        /*Finalization*/
        const resetBtnTransaction = document.getElementById('resetBtnTransaction')
        const acceptBtnTransaction = document.getElementById('acceptBtnTransaction')
        
         
    /*Creación de los métodos)*/
        /*Musée de l'inquisition*/
        sumaBtn11.addEventListener('click', () => {
            valorFijo += 11;
            contadorSumas11 += 1;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElement11.textContent = contadorSumas11;
            actualizarResultadoGlobal();
        });
    
        resetBtn11.addEventListener('click', () => {
            valorFijo = valorFijo-(11*contadorSumas11);
            contadorSumas11 = 0;        
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElement11.textContent = contadorSumas11;
            actualizarResultadoGlobal();
        });
    
        sumaBtn950.addEventListener('click', () => {
            valorFijo += 9.50;
            contadorSumas950 += 1;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElement950.textContent = contadorSumas950;
            actualizarResultadoGlobal();
        });
    
        resetBtn950.addEventListener('click', () => {
            valorFijo = valorFijo-(9.50*contadorSumas950);;
            contadorSumas950 = 0;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElement950.textContent = contadorSumas950;
            actualizarResultadoGlobal();
        });
    
        sumaBtnEnfant.addEventListener('click', () => {
            valorFijo += 8.50;
            contadorSumasEnfant += 1;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElementEnfant.textContent = contadorSumasEnfant;
            actualizarResultadoGlobal();
        });
    
        resetBtnEnfant.addEventListener('click', () => {
            valorFijo = valorFijo -(8.50*contadorSumasEnfant);;;
            contadorSumasEnfant = 0;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElementEnfant.textContent = contadorSumasEnfant;
            actualizarResultadoGlobal();
        });
    
        sumaBtnEtudiant.addEventListener('click', () => {
            valorFijo += 9.50;
            contadorSumasEtudiant += 1;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElementEtudiant.textContent = contadorSumasEtudiant;
            actualizarResultadoGlobal();
        });
    
        resetBtnEtudiant.addEventListener('click', () => {
            valorFijo = valorFijo -(9.50*contadorSumasEtudiant);;;
            contadorSumasEtudiant = 0;
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElementEtudiant.textContent = contadorSumasEtudiant;
            actualizarResultadoGlobal();
        });


        resetBtnMusee.addEventListener('click', () => {
            valorFijo = 0;
            contadorSumas11 = 0;
            contadorSumas950 = 0;
            contadorSumasEnfant = 0;
            contadorSumasEtudiant = 0;        
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElement11.textContent = contadorSumas11;
            contadorElement950.textContent = contadorSumas950;
            contadorElementEnfant.textContent = contadorSumasEnfant;
            contadorElementEtudiant.textContent = contadorSumasEtudiant;
            actualizarResultadoGlobal();
        });
        /*Maison Hantée*/
    
        sumaBtnMH.addEventListener('click', () => {
            valorFijoMH += 10;
            contadorSumasMH += 1;
            resultadoElementMH.textContent = valorFijoMH.toFixed(2);
            contadorElementMH.textContent = contadorSumasMH;
            actualizarResultadoGlobal();
        });
    
        resetBtnMH.addEventListener('click', () =>{
            valorFijoMH = valorFijoMH -(10*contadorSumasMH);;;
            contadorSumasMH = 0;
            resultadoElementMH.textContent = valorFijoMH.toFixed(2);
            contadorElementMH.textContent =contadorSumasMH;
            actualizarResultadoGlobal();
        });
    
        sumaBtnMHEsp.addEventListener('click', () => {
            valorFijoMH += 15;
            contadorSumasMHEsp += 1;
            resultadoElementMH.textContent = valorFijoMH.toFixed(2);
            contadorElementMHEsp.textContent = contadorSumasMHEsp;
            actualizarResultadoGlobal();
        });
    
        resetBtnMHEsp.addEventListener('click', () =>{
            valorFijoMH = valorFijoMH -(15*contadorSumasMHEsp);;;
            contadorSumasMHEsp = 0;
            resultadoElementMH.textContent = valorFijoMH.toFixed(2);
            contadorElementMHEsp.textContent =contadorSumasMHEsp;
            actualizarResultadoGlobal();
        });

        resetBtnMaison.addEventListener('click', () => {
            valorFijoMH = 0;
            contadorSumasMH = 0;
            contadorSumasMHEsp = 0;
            resultadoElementMH.textContent = valorFijoMH.toFixed(2);
            contadorElementMH.textContent = contadorSumas11;
            contadorElementMHEsp.textContent = contadorSumas950;
            actualizarResultadoGlobal();
           
        });
    
        /*Pack Promo*/
    
        sumaBtnPromoAdult.addEventListener('click', () => {
            valorFijoPromo += 19;
            contadorSumasPromoAdult += 1;
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoAdult.textContent = contadorSumasPromoAdult;
            actualizarResultadoGlobal();
        });
    
        resetBtnPromoAdult.addEventListener('click', () => { 
            valorFijoPromo = valorFijoPromo - (19*contadorSumasPromoAdult);
            contadorSumasPromoAdult =0;
            resultadoElementPromo.textContent =valorFijoPromo.toFixed(2);
            contadorElementPromoAdult.textContent = contadorSumasPromoAdult;
            actualizarResultadoGlobal();
        });
    
        sumaBtnPromoEtudiant.addEventListener('click', () => {
            valorFijoPromo += 17;
            contadorSumasPromoEtudiant += 1;
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoEtudiant.textContent = contadorSumasPromoEtudiant;
            actualizarResultadoGlobal();
        });
    
        resetBtnPromoEtudiant.addEventListener('click', () => {
            valorFijoPromo = valorFijoPromo-(17*contadorSumasPromoEtudiant);
            contadorSumasPromoEtudiant = 0;        
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoEtudiant.textContent = contadorSumasPromoEtudiant;
            actualizarResultadoGlobal();
        });
    
        sumaBtnPromoEnfant.addEventListener('click', () => {
            valorFijoPromo += 16;
            contadorSumasPromoEnfant += 1;
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoEnfant.textContent = contadorSumasPromoEnfant;
            actualizarResultadoGlobal();
        });
    
        resetBtnPromoEnfant.addEventListener('click', () => {
            valorFijoPromo = valorFijoPromo -(16*contadorSumasPromoEnfant);
            contadorSumasPromoEnfant = 0;        
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoEnfant.textContent = contadorSumasPromoEnfant;
            actualizarResultadoGlobal();
        });
    
        resetBtnPack.addEventListener('click', () => {
            valorFijoPromo = 0;
            contadorSumasPromoAdult = 0;
            contadorSumasPromoEnfant = 0;
            contadorSumasPromoEtudiant = 0;
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoAdult.textContent = contadorSumasPromoAdult;
            contadorElementPromoEnfant.textContent = contadorSumasPromoEnfant;
            contadorElementPromoEtudiant.textContent = contadorSumasPromoEtudiant;
            contadorElementMH.textContent = contadorSumas11;
            contadorElementMHEsp.textContent = contadorSumas950;
            actualizarResultadoGlobal();
           
        });

/*Boton de anulación*/
        resetBtnTransaction.addEventListener('click', () => {

            valorFijo = 0;
            contadorSumas11 = 0;
            contadorSumas950 = 0;
            contadorSumasEnfant = 0;
            contadorSumasEtudiant = 0;        
            resultadoElement.textContent = valorFijo.toFixed(2);
            contadorElement11.textContent = contadorSumas11;
            contadorElement950.textContent = contadorSumas950;
            contadorElementEnfant.textContent = contadorSumasEnfant;
            contadorElementEtudiant.textContent = contadorSumasEtudiant;

            valorFijoMH = 0;
            contadorSumasMH = 0;
            contadorSumasMHEsp = 0;
            resultadoElementMH.textContent = valorFijoMH.toFixed(2);
            contadorElementMH.textContent = contadorSumas11;
            contadorElementMHEsp.textContent = contadorSumas950;

            valorFijoPromo = 0;
            contadorSumasPromoAdult = 0;
            contadorSumasPromoEnfant = 0;
            contadorSumasPromoEtudiant = 0;
            resultadoElementPromo.textContent = valorFijoPromo.toFixed(2);
            contadorElementPromoAdult.textContent = contadorSumasPromoAdult;
            contadorElementPromoEnfant.textContent = contadorSumasPromoEnfant;
            contadorElementPromoEtudiant.textContent = contadorSumasPromoEtudiant;
            contadorElementMH.textContent = contadorSumas11;
            contadorElementMHEsp.textContent = contadorSumas950;
            

            actualizarResultadoGlobal();
        });


        document.getElementById('acceptBtnTransaction').addEventListener('click', function() {
            const tickets = {
                adult: document.getElementById('contador11').innerText,
                handicape: document.getElementById('contador950').innerText,
                etudiant: document.getElementById('contadorEtudiant').innerText,
                enfant: document.getElementById('contadorEnfant').innerText,
                standard: document.getElementById('contadorMH').innerText,
                special: document.getElementById('contadorMHEsp').innerText,
                packAdult: document.getElementById('contadorPromoAdult').innerText,
                packEtudiant: document.getElementById('contadorPromoEtudiant').innerText,
                packEnfant: document.getElementById('contadorPromoEnfant').innerText,
                resGlobal: document.getElementById('resultadoGlobal').innerText
                
                
            };

            const params = new URLSearchParams({
                resultadoGlobal,
                ...tickets
            });
        
            const url = new URL('tickets.html', window.location.href);
            Object.keys(tickets).forEach(key => url.searchParams.append(key, tickets[key]));
        
            window.location.href = url;
        }); 

       


    });