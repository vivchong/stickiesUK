// function for form to open upon click
function TestsFunction() {
    var T = document.getElementById("TestsDiv");
    T.style.display = "block";  // <-- Set it to block
}

function TestsFunction2() {
    var T2 = document.getElementById("TestsDiv2");
    T2.style.display = "block";  // <-- Set it to block
}

// function to select shipping option
function ShippingOption(input) {
    var T= document.getElementById("shipping-option");
    var local = document.getElementById("local-shipping");
    var express = document.getElementById("express-shipping");
    switch (input){
      case 1:
        T.style.display = "block";  // <-- Set it to block
        local.style.display = "block";
        express.style.display = "none";
        break;
      case 2:
        T.style.display = "block";  // <-- Set it to block
        express.style.display = "block";
        local.style.display= "none";
        break;
    }
}
