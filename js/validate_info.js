// declare variables for form
let form = document.querySelector("form");

function validateEmail() {
    let email = document.querySelector('#email').value;
    let text = document.querySelector('#text');
    let pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    // Validation de l'email
    if (email.match(pattern)) {
        text.classList.add('Valid');
        text.classList.remove('invalid');
        text.innerHTML = "Your Email Address is Valid";
        text.style.color = "green"
    }
    else {
        text.classList.remove('Valid'); // Utilisez 'Valid' au lieu de 'valid'
        text.classList.add('invalid'); // Ajoutez 'invalid' au lieu de 'Valid'
        text.innerHTML = "* Please Enter Email Address";
        text.style.color = "red";
    }
    if (email === "") {
        text.classList.remove('valid');
        text.classList.remove('invalid');
        text.innerHTML = "";
    }
}

function validateLastName() {
    let inputLastName = document.getElementById('last-name');
    let lastNameError = document.getElementById('last-name-error');
    let lastName = inputLastName.value.trim();
    let pattern = /^[a-zA-Z\-']+$/; // Uniquement des lettres, tirets et apostrophes autorisés

    if (lastName.length === 0) {
        lastNameError.textContent = "* Last name is required";
        lastNameError.style.color = "red";
        inputLastName.classList.add('invalid');
    } else if (lastName.length <= 2 || lastName.length > 255) {
        lastNameError.textContent = "* Last name must be between 3 and 255 characters";
        lastNameError.style.color = "red";
        inputLastName.classList.add('invalid');
    } else if (!lastName.match(pattern)) {
        lastNameError.textContent = "* Invalid last name format";
        lastNameError.style.color = "red";
        inputLastName.classList.add('invalid');
    } else {
        lastNameError.textContent = "Last name is valid";
        lastNameError.style.color = "green"; // Mettre le texte en vert pour indiquer que c'est valide
        inputLastName.classList.remove('invalid');
        inputLastName.classList.add('valid'); // Ajouter une classe 'valid' pour styliser en vert
    }
}

function validateFirstName() {
    let inputFirstName = document.getElementById('first-name');
    let firstNameError = document.getElementById('first-name-error');
    let firstName = inputFirstName.value.trim();
    let pattern = /^[a-zA-Z\-']+$/; // Uniquement des lettres, tirets et apostrophes autorisés

    if (firstName.length === 0) {
        firstNameError.textContent = "* First name is required";
        firstNameError.style.color = "red";
        inputFirstName.classList.add('invalid');
    } else if (firstName.length <= 2 || firstName.length > 255) {
        firstNameError.textContent = "* First name must be between 3 and 255 characters";
        firstNameError.style.color = "red";
        inputFirstName.classList.add('invalid');
    } else if (!firstName.match(pattern)) {
        firstNameError.textContent = "* Invalid first name format";
        firstNameError.style.color = "red";
        inputFirstName.classList.add('invalid');
    } else {
        firstNameError.textContent = "First name is valid";
        firstNameError.style.color = "green"; // Mettre le texte en vert pour indiquer que c'est valide
        inputFirstName.classList.remove('invalid');
        inputFirstName.classList.add('valid'); // Ajouter une classe 'valid' pour styliser en vert
    }
}

function validateDescription() {
    let description = document.getElementById('about');
    let descriptionError = document.getElementById('description-error');
    let descriptionText = description.value.trim();

    if (descriptionText.length < 2) {
        descriptionError.textContent = "* Description must be at least 2 characters long";
        descriptionError.style.color = "red";
        description.classList.add('invalid');
    } else if (descriptionText.length > 100) {
        descriptionError.textContent = "* Description must be at most 100 characters long";
        descriptionError.style.color = "red";
        description.classList.add('invalid');
    } else {
        descriptionError.textContent = "Description is valid";
        descriptionError.style.color = "green"; // Mettre le texte en vert pour indiquer que c'est valide
        description.classList.remove('invalid');
        description.classList.add('valid'); // Ajouter une classe 'valid' pour styliser en vert
    }
}

function formValidate() {
    // Ajoutez un gestionnaire d'événement pour soumettre le formulaire
    form.addEventListener('submit', function (event) {
        // Empêcher l'envoi du formulaire par défaut
        event.preventDefault();

        // Valider tous les champs du formulaire
        validateEmail();
        validateLastName();
        validateFirstName();
        validateDescription();

        // Vérifier si tous les champs sont valides
        if (document.querySelectorAll('.invalid').length > 0) {
            // Afficher un message d'erreur ou prendre une autre action appropriée
            alert("Please fill in all required fields correctly.");
            return;
        }

        // Si tous les champs sont valides, vous pouvez soumettre le formulaire
        form.submit();

    });
}

formValidate();
