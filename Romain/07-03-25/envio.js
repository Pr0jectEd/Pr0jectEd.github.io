$(document).ready(function() {
    $("#array_form").submit(function(event) {
        console.log("Formulario cargado");
        event.preventDefault();
        $.ajax({

            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
        }).done(function(data) {
        

            // on crée l'élément <table>
            const table = document.createElement('table');
            
            // on crée l'entête du tableau
            let thead = document.createElement('thead');
            // on crée une ligne pour l'entête
            let headerRow = document.createElement('tr');

            // on crée un tableau avec les titres des colonnes
            let headers = ['INDEX', 'VALEUR'];
            // pour chaque colonne
            headers.forEach(function(title) {
                // on crée une balise th
                let th = document.createElement('th');
                // on y ajoute le titre de la colonne
                th.textContent = title;
                // on ajoute la balise à la ligne pour l'entête
                headerRow.appendChild(th);
            });

            // on ajoute la ligne à l'entête du tableau
            thead.appendChild(headerRow);
            // on ajoute l'entête au tableau
            table.appendChild(thead);

            // on crée le corps du tableau
            let tbody = document.createElement('tbody');

            // on parcourt le JSON renvoyé par PHP
            data.forEach(function(mot, index) {
                // on crée une balise tr (ligne du tableau)
                let row = document.createElement('tr');

                // on crée la première colonne
                let tdIndex = document.createElement('td');
                tdIndex.textContent = index;
                row.appendChild(tdIndex);

                // on crée la deuxième colonne
                let tdMot = document.createElement('td');
                tdMot.textContent = mot;
                row.appendChild(tdMot);

                // on ajoute la ligne créée au <tbody>
                tbody.appendChild(row);
            })

            // on ajoute le corps au tableau
            table.appendChild(tbody);

            // on met le tout dans le div "result"
            $("#result").html(table);

        });
    });
});