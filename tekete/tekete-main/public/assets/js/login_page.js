var radio = document.querySelectorAll('input[type="radio"]');

function selectRadioWithValue(value) {
  radio.forEach(function (radio) {
    if (radio.value === value) {
      radio.checked = true;
    } else {
      radio.checked = false;
    }
  });
}
// let's find checkbox with value "User", select it and focus

selectRadioWithValue("User");

//Welocme alert

function redirect() {
  swal({
    title: "Welcome to TEKETE",
    icon: "success",
    button: true,
  }).then((redirect) => {
    if (redirect) {
      window.location.href = "track a ticket/frontend.php";
    }
  });
}

//Error warning

function error() {
  swal({
    title: "Error",
    text: "Username or Password incorrect!!",
    icon: "warning",
    button: true,
    dangerMode: true,
  });
}

function clearMobile() {
  document.getElementById("mobilePassword").value = "";
  document.getElementById("mobileEmail").value = "";
}
function clearField() {
  var fields = ["emailAddress", "password"];

  var i,
    l = fields.length;
  var fieldname;
  var isComplete = 0;

  for (i = 0; i < l; i++) {
    fieldname = fields[i];

    if (document.forms["myForm"][fieldname].value === "") {
    } else {
      isComplete = 1;
    }
  }

  if (isComplete === 1) {
    swal({
      title: "Are you sure you want to clear?",
      text: "You will not be able to recover this!",
      icon: "warning",
      buttons: ["No, cancel it!", "Yes, I am sure!"],
      dangerMode: true,
    }).then(function (isConfirm) {
      if (isConfirm) {
        document.getElementById("myForm").reset();
      } else {
      }
    });
  }
}





  function changeToEmail() {
    document.getElementById("identify").innerHTML = "Email:";
     document.getElementById("changetype").setAttribute("placeholder", "Email");
       // document.getElementById("changetype").setAttribute("type", "password");
  }

   function changeAdmin() {
       
   document.getElementById("identify").innerHTML = "Admin No";
   var changetype = document.getElementsByName('emailAddress')[0];
    changetype.setAttribute('placeholder', 'Admin No');
    changetype.type = 'number';
  
 }