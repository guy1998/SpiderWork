function validateForm() {
  let x = document.forms["login"]["username"].value;
  document.forms['login']['username'].style.border = "none";
  if (x == "") {
    document.forms['login']['username'].style.border = "2px solid red";
    return false;
  }
    
  let y = document.forms["login"]["password"].value;
  document.forms['login']['password'].style.border = "none";
  if (y == "") {
    document.forms['login']['password'].style.border = "2px solid red";
      return false;
  } 

}
