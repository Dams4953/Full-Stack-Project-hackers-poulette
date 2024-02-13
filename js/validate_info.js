// declare variables for form
let inputFirstName = document.getElementById('first-name_input');
let inputlastName = document.getElementById('last-name');
let email = document.getElementById('email');
let description = document.getElementById('about');
let uploadFile = document.getElementById('file');
let containerFirstName = document.getElementsByClassName('.firstname');


inputFirstName.addEventListener('keypress', function(event) {
    if (event.key === 'Enter' && (inputFirstName.value.length <= 2 || inputFirstName.value.length > 255)) {
        let firstNameError = document.createElement('span');
        firstNameError.textContent = 'Veuillez entrer un prénom valide';
        containerFirstName.appendChild(firstNameError);
    }
});
