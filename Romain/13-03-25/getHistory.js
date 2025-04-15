getHistoryPHP(function (data) {
    let tableau_data = data.split("|");
    //supprimer les " de mon tableau
    tableau_data.splice(0, 1);
    tableau_data.splice(4, 1);

    console.log(data);
    //Creation des élément
    let historique = document.getElementById("calculator");
    let div_historique = document.createElement("div");
    div_historique.setAttribute("class", "historique");
    div_historique.setAttribute("id", "visible");
    insertAfter(div_historique, historique.lastElementChild);
    //Creation p date
    let date_historique = document.createElement("p");
    date_historique.setAttribute("id", "date_hist");
    date_historique.textContent += tableau_data[1];});