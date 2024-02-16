const form = document.getElementById("form_contact");

function validateEmail() {
    const email = document.getElementById('email').value.trim();
    const text = document.getElementById('text');
    const pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    if (email === "") {
        displayErrorMessage(text, "* Please Enter a invalid Email Address", "red");
        return false;
    } else if (email.match(pattern)) {
        displaySuccessMessage(text, "Your Email Address is Valid", "green");
        return true;
    } else {
        displayErrorMessage(text, "* Please Enter a valid email address", "red");
        return false;
    }
}

function validateLastName() {
    const inputLastName = document.getElementById('last-name');
    const lastNameError = document.getElementById('last-name-error');
    const lastName = inputLastName.value.trim();
    const pattern = /^[a-zA-Z\-']+$/; 

    if (lastName.length === 0) {
        displayErrorMessage(lastNameError, "* Last name is required", "red");
        return false;
    } else if (lastName.length <= 2 || lastName.length > 255 || !lastName.match(pattern)) {
        displayErrorMessage(lastNameError, "* Invalid last name format", "red");
        return false;
    } else {
        displaySuccessMessage(lastNameError, "Last name is valid", "green");
        return true;
    }
}

function validateFirstName() {
    const inputFirstName = document.getElementById('first-name');
    const firstNameError = document.getElementById('first-name-error');
    const firstName = inputFirstName.value.trim();
    const pattern = /^[a-zA-Z\-']+$/;

    if (firstName.length === 0) {
        displayErrorMessage(firstNameError, "* First name is required", "red");
        return false;
    } else if (firstName.length <= 2 || firstName.length > 255 || !firstName.match(pattern)) {
        displayErrorMessage(firstNameError, "* Invalid first name format", "red");
        return false;
    } else {
        displaySuccessMessage(firstNameError, "First name is valid", "green");
        return true;
    }
}

function validateDescription() {
    const description = document.getElementById('about');
    const descriptionError = document.getElementById('description-error');
    const descriptionText = description.value.trim();

    if (descriptionText.length < 2 || descriptionText.length > 100) {
        displayErrorMessage(descriptionError, "* Description must be between 2 and 100 characters long", "red");
        return false;
    } else {
        displaySuccessMessage(descriptionError, "Description is valid", "green");
        return true;
    }
}

function formValidate() {
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const isEmailValid = validateEmail();
        const isLastNameValid = validateLastName();
        const isFirstNameValid = validateFirstName();
        const isDescriptionValid = validateDescription();

        if (!isEmailValid || !isLastNameValid || !isFirstNameValid || !isDescriptionValid) {
            alert("Please fill in all required fields correctly.");
            return;
        }
    });
}

function displayErrorMessage(element, message, color) {
    element.textContent = message;
    element.style.color = color;
}

function displaySuccessMessage(element, message, color) {
    element.textContent = message;
    element.style.color = color;
}

export { form, validateEmail, validateLastName, validateFirstName, validateDescription, formValidate };
