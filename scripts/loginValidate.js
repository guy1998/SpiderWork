function validateForm() {
    let x = document.forms["login"]["username"].value;
    if (x == "") {
      alert("Username must be filled out");
      return false;
    }
    
    password = ((?=^.{6,}$)(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).*);
    let y = document.forms["login"]["pasword"].value;
    if (y == "") {
        alert("Password must be filled out");
        return false;
      } 
  }