function validateForm() {
    let textPattern = /[a-zA-Z]+/g;
    let numPattern = /\d+/g;
    //For dobutamine validation
    let dobutamine = document.forms["sofaForm"]["dobutamine"].value;
    if(containsSpecialChars(dobutamine) == true) {
        alert("Dobutamine must not contain any special characters!");
        return false;
    } else if(textPattern.test(dobutamine) == true) {
        alert("Dobutamine must not contain any text character!");
        return false;
    } else if(numPattern.test(dobutamine) == true) {
        return true;
    }
}

function containsSpecialChars(str) {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if(specialChars.test(str)){
        return true;
    } else {
        return false;
    }
 }