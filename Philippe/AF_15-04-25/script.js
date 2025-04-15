document.querySelector('#paysForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const data = {
        pName: document.querySelector('#pName').value,
        continent: document.querySelector('#continent').value,
        population: document.querySelector('#population').value,
    };

    console.log("Step 1: starting to fetch:",data);//debug

    fetch('controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
        
    })
    .then(res => res.json())
    .then(response => {
        const div = document.querySelector('#answer');
        div.textContent = response.message;
        div.style.color = response.color;
    })
    .catch(error => console.error('Error:', error));
});
