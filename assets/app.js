const urlParams = new URLSearchParams(window.location.search);

if (urlParams.has('error') && urlParams.get('error') === '1') {
    document.getElementById('error-message-connexion').innerText = "Email ou mot de passe incorrect.";
    document.getElementById('error-message-connexion').style.display = "block";
}

if (urlParams.has('error') && urlParams.get('error') === '2') {
    document.getElementById('error-message-inscription').innerText = "Informations manquantes ou compte déjà existant.";
    document.getElementById('error-message-inscription').style.display = "block";
}

const connexionForm = document.getElementById('connexion-form');
const inscriptionForm = document.getElementById('inscription-form');
const showInscriptionButton = document.getElementById('show-inscription');
const showConnexionButton = document.getElementById('show-connexion');

/*
showInscriptionButton.addEventListener('click', function() {
    connexionForm.classList.add('hidden');
    inscriptionForm.classList.remove('hidden');
});

showConnexionButton.addEventListener('click', function() {
    inscriptionForm.classList.add('hidden');
    connexionForm.classList.remove('hidden');
});
*/

function toggleForm(id) {
    var form = document.getElementById(id);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}