const modifyUser = function(usertype){

    if(usertype === "employer"){

              let companyName = document.getElementById('name1').value;
              let ownerName = document.getElementById('surname1').value;
              let ownerSurname = document.getElementById('surname2').value;
              let phone = document.getElementById("phone").value;
              let email = document.getElementById("email").value;
              let username = document.getElementById("username").value;

              var xhr = new XMLHttpRequest();
              xhr.open('POST', '../controller/set_modifying.php', true);
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
              xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                  console.log('Session variable set successfully');
                  } else {
                  console.error('Error setting session variable');
                  }
              }
              };
              var data = 'username=' + encodeURIComponent(username) +
         '&companyName=' + encodeURIComponent(companyName) +
         '&ownerName=' +encodeURIComponent(ownerName) +
         '&ownerSurname=' + encodeURIComponent(ownerSurname) +
         '&email=' + encodeURIComponent(email) +
         '&phone=' + encodeURIComponent(phone);
          console.log(data);
         xhr.send(data);
         window.location.replace("../controller/modifyUser.php");
    }else{
          let name = document.getElementById("name").value;
          let surname = document.getElementById("surname").value;
          let phone = document.getElementById("phone").value;
          let email = document.getElementById("email").value;
          let username = document.getElementById("username").value;
          if(name && surname && phone && email && username){
            var xhr = new XMLHttpRequest();
              xhr.open('POST', '../controller/set_modifying.php', true);
              xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
              xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  if (xhr.status === 200) {
                  console.log('Session variable set successfully');
                  } else {
                  console.error('Error setting session variable');
                  }
              }
              };
              var data = 'username=' + encodeURIComponent(username) +
         '&name=' + encodeURIComponent(name) +
         '&surname=' + encodeURIComponent(surname) +
         '&email=' + encodeURIComponent(email) +
         '&phone=' + encodeURIComponent(phone);
         console.log("Before data");
          console.log(data)
          console.log("After data");
          xhr.send(data);
          window.location.replace("../controller/modifyUser.php");
          
    }
  }
}