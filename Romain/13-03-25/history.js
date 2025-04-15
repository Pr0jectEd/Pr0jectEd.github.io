function getHistoryPHP(callback) {
  // Créer une requête AJAX pour récupérer les données du fichier PHP
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "historique.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Si la requête est terminée et a réussi, appeler le callback avec les données reçues
      callback(xhr.responseText);
    }
  };
  xhr.send();
}