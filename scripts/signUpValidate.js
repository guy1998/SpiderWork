let errorMessages = document.getElementsByClassName('errorMessage');

function validateWorker() {
  let x = document.forms["formwork"]["name"].value;
  let elements = document.getElementsByClassName('workForm');
  for(let i=0; i<elements.length; i++){
    console.log("Yes");
    elements[i].style.borderColor = "black";
  }
  if (x == "") {
    errorMessages[0].innerHTML = "Name must be filled out";
    elements[0].style.borderColor = "red";
    return false;
  }

  let z = document.forms["formwork"]["surname"].value;
  if (z == "") {
    errorMessages[0].innerHTML = "Surname must be filled out";
    elements[1].style.borderColor = "red";
    return false;
  }

  let a = document.forms["formwork"]["email"].value;
  if (a == "") {
    errorMessages[0].innerHTML = "Email must be filled out";
    elements[2].style.borderColor = "red";
    return false;
  }

  let b = document.forms["formwork"]["phone"].value;
  if (b == "") {
    errorMessages[0].innerHTML = "Phone number must be filled out";
    elements[3].style.borderColor = "red";
    return false;
  }

  let c = document.forms["formwork"]["birthday"].value;
  if (c == "") {
    errorMessages[0].innerHTML = "Birthday must be filled out";
    elements[4].style.borderColor = "red";
    return false;
  }

  let d = document.forms["formwork"]["field"].value;
  if (d == "") {
    errorMessages[0].innerHTML = "Field must be filled out";
    elements[5].style.borderColor = "red";
    return false;
  }

  let e = document.forms["formwork"]["username"].value;
  if (e == "") {
    errorMessages[0].innerHTML = "Username must be filled out";
    elements[6].style.borderColor = "red";
    return false;
  }

  let f = document.forms["formwork"]["password"].value;
  if (f == "") {
    errorMessages[0].innerHTML = "Password must be filled out";
    elements[7].style.borderColor = "red";
    return false;
  }
  if(f.length < 8){
    errorMessages[0].innerHTML = "Password must be 8 characters long";
    elements[7].style.borderColor = "red";
    return false;
  }
  var regularExpression = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).+$");
  if(!f.match(regularExpression)){
    errorMessages[0].innerHTML = "Password must have at least:<br>one uppercase<br>one lowercase<br>one number";
    elements[7].style.borderColor = "red";
    return false;
  }

  let i = document.forms["formwork"]["school"].value;
  if (i == "") {
    errorMessages[0].innerHTML = "School must be filled";
    elements[8].style.borderColor = "red";
    return false;
  }

  let j = document.forms["formwork"]["degree"].value;
  if (j == "") {
    errorMessages[0].innerHTML = "Degree must be filled";
    elements[9].style.borderColor = "red";
    return false;
  }
  
}


function validateEmployer() {
  let elements = document.getElementsByClassName('empForm');
  for(let i=0; i<elements.length; i++){
    console.log("Yes");
    elements[i].style.borderColor = "black";
  }
  let x = document.forms["formemp"]["Coname"].value;
  if (x == "") {
    errorMessages[1].innerHTML = "Company name must be filled out";
    elements[0].style.borderColor = "red";
    return false;
  }

  let z = document.forms["formemp"]["Oname"].value;
  if (z == "") {
    errorMessages[1].innerHTML = "Owner's name must be filled out";
    elements[1].style.borderColor = "red";
    return false;
  }

  let a = document.forms["formemp"]["Osurname"].value;
  if (a == "") {
    errorMessages[1].innerHTML = "Owner's surname must be filled out";
    elements[2].style.borderColor = "red";
    return false;
  }

  let b = document.forms["formemp"]["Contactname"].value;
  if (b == "") {
    errorMessages[1].innerHTML = "Contact's name must be filled out";
    elements[3].style.borderColor = "red";
    return false;
  }

  let c = document.forms["formemp"]["Contactsurname"].value;
  if (c == "") {
    errorMessages[1].innerHTML = "Contact's surname must be filled out";
    elements[4].style.borderColor = "red";
    return false;
  }

  let d = document.forms["formemp"]["email"].value;
  if (d == "") {
    errorMessages[1].innerHTML = "Email must be filled out";
    elements[5].style.borderColor = "red";
    return false;
  }

  let e = document.forms["formemp"]["phone"].value;
  if (e == "") {
    errorMessages[1].innerHTML = "Phone number must be filled out";
    elements[6].style.borderColor = "red";
    return false;
  }

  let f = document.forms["formemp"]["fd"].value;
  if (f == "") {
    errorMessages[1].innerHTML = "Founding date must be filled out";
    elements[7].style.borderColor = "red";
    return false;
  }

  let g = document.forms["formemp"]["field"].value;
  if (g == "") {
    errorMessages[1].innerHTML = "Working field must be filled out";
    elements[8].style.borderColor = "red";
    return false;
  }

  let k = document.forms["formemp"]["username"].value;
  if (k == "") {
    errorMessages[1].innerHTML = "Username must be filled out";
    elements[9].style.borderColor = "red";
    return false;
  }

  let l = document.forms["formemp"]["password"].value;
  if (l == "") {
    errorMessages[1].innerHTML = "Password must be filled out";
    elements[10].style.borderColor = "red";
    return false;
  }
   if(l.length < 8){
    errorMessages[1].innerHTML = "Password must be at least 8 characters long!";
    elements[10].style.borderColor = "red";
    return false;
  }
  var regularExpression = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).+$");
  if(!l.match(regularExpression)){
    errorMessages[1].innerHTML = "Password must have at least:<br>one uppercase<br>one lowercase<br>one number";
    elements[10].style.borderColor = "red";
    return false;
  }
  
}

function validateRecruiter() {
  let x = document.forms["formreq"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }

  let z = document.forms["formreq"]["surname"].value;
  if (z == "") {
    alert("Surname must be filled out");
    return false;
  }

  let a = document.forms["formreq"]["email"].value;
  if (a == "") {
    alert("Email must be filled out");
    return false;
  }

  let b = document.forms["formreq"]["phone"].value;
  if (b == "") {
    alert("Phone number must be filled out");
    return false;
  }

  let c = document.forms["formreq"]["birthday"].value;
  if (c == "") {
    alert("Birthday must be filled out");
    return false;
  }

  let e = document.forms["formreq"]["username"].value;
  if (e == "") {
    alert("Username must be filled out");
    return false;
  }

  let f = document.forms["formreq"]["password"].value;
  if (f == "") {
    alert("Password must be filled out");
    return false;
  }
   if(f.length < 8){
    alert("Password must be 8 characters long");
    return false;
  }
  var regularExpression = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).+$");
  if(!f.match(regularExpression)){
    alert("Password should contain at least one digit, at least one lower case, at least one upper case");
    return false;
  }

}
