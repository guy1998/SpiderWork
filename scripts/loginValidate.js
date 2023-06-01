function validateForm() {
    let x = document.forms["login"]["username"].value;
    if (x == "") {
      alert("Username must be filled out");
      return false;
    }
      
    let y = document.forms["login"]["pasword"].value;
    if (y == "") {
        alert("Password must be filled out");
        return false;
      } 
  }