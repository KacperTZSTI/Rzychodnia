let input = document.querySelector("#lek");
let lekarze = document.querySelector("#lekarze");
let input2 = document.querySelector("#ter");
let terminy = document.querySelector("#terminy");

input.onfocus = function () {
    lekarze.style.display = 'block';
    input.style.borderRadius = "5px 5px 0 0";  
  };
  for (let option of lekarze.options) {
    option.onclick = function () {
      input.value = option.value;
      lekarze.style.display = 'none';
      input.style.borderRadius = "5px";
    }
  };
  
  input.oninput = function() {
    currentFocus = -1;
    var text = input.value.toUpperCase();
    for (let option of lekarze.options) {
      if(option.value.toUpperCase().indexOf(text) > -1){
        option.style.display = "block";
    }else{
      option.style.display = "none";
      }
    };
  }
  var currentFocus = -1;
  input.onkeydown = function(e) {
    if(e.keyCode == 40){
      currentFocus++
     addActive(lekarze.options);
    }
    else if(e.keyCode == 38){
      currentFocus--
     addActive(lekarze.options);
    }
    else if(e.keyCode == 13){
      e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (lekarze.options) lekarze.options[currentFocus].click();
          }
    }
  }
  
  function addActive(x) {
      if (!x) return false;
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      x[currentFocus].classList.add("active");
    }
    function removeActive(x) {
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("active");
      }
    }



input2.onfocus = function () {
    terminy.style.display = 'block';
    input2.style.borderRadius = "5px 5px 0 0";  
  };
  for (let option of terminy.options) {
    option.onclick = function () {
      input2.value = option.value;
      terminy.style.display = 'none';
      input2.style.borderRadius = "5px";
    }
  };
  
  input2.oninput = function() {
    currentFocus = -1;
    var text = input2.value.toUpperCase();
    for (let option of terminy.options) {
      if(option.value.toUpperCase().indexOf(text) > -1){
        option.style.display = "block";
    }else{
      option.style.display = "none";
      }
    };
  }
  var currentFocus = -1;
  inputw.onkeydown = function(e) {
    if(e.keyCode == 40){
      currentFocus++
     addActive(terminy.options);
    }
    else if(e.keyCode == 38){
      currentFocus--
     addActive(terminy.options);
    }
    else if(e.keyCode == 13){
      e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (terminy.options) terminy.options[currentFocus].click();
          }
    }
  }
  
  function addActive(x) {
      if (!x) return false;
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      x[currentFocus].classList.add("active");
    }
    function removeActive(x) {
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("active");
      }
    }



