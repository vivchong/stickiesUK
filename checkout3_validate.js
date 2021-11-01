//only allows numbers to be input as card number
function validatecard(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function validateDate(){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();

  if (dd < 10) {
     dd = '0' + dd;
  }

  if (mm < 10) {
     mm = '0' + mm;
  }

  today = yyyy + '-' + mm + '-' + dd;
  document.getElementById("date").setAttribute("min", today);
}

function NewAddress(input){
  switch(input){
    case 1:
      new_address=document.getElementById("newAddress");
      if (document.getElementById("samecheck").checked){
      }
      else{
        break;
      }
      break;
    case 2:
      new_address=document.getElementById("newAddress");
      if (document.getElementById("differentcheck").checked){
        new_address.type="number";
      }
      else{
        break;
      }
      break;
  }
}
