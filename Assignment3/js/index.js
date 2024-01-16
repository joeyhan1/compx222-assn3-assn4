function validateForm() {
    let pattern = /\d/g;
    //For NHI number validation
    let nhi = document.forms["indexForm"]["nhi"].value;
    let nhiPattern = /[A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9]/g;
    if(nhiPattern.test(nhi) == false || nhi.length != 7) {
        alert("Please follow this format for the NHI Number. Format: [A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9]");
        return false;
    }
    //For first name validation
    let fname = document.forms["indexForm"]["fname"].value;
    if(fname == "" || fname.length < 2) {
      alert("First name must contain 2 of more letters!");
      return false;
    } else if(containsSpecialChars(fname) == true) {
        alert("First name must not contain any special characters!");
        return false;
    } else if(pattern.test(fname) == true) {
        alert("First name must not contain any numbers!");
        return false;
    }
    //For surname validation
    let sname = document.forms["indexForm"]["sname"].value;
    if(sname == "" || sname.length < 2) {
        alert("Surname must contain 2 of more letters!");
        return false;
    } else if(containsSpecialChars(sname) == true) {
        alert("Surname must not contain any special characters!");
        return false;
    } else if(pattern.test(sname) == true) {
        alert("Surname must not contain any numbers!");
        return false;
    }
    return true;
}

function containsSpecialChars(str) {
    const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if(specialChars.test(str)){
        return true;
    } else {
        return false;
    }
 }