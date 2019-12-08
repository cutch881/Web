window.addEventListener('load', () => {


  let errorFound1 = true;
  let errorFound2 = true; 
  let errorFound3 = true;
  let errorFound4 = true;
  let errorFound5 = true;
  let errorFound6 = true;
  let errorFound7 = true;
  
 
  function disabler()
  {
    //if any field has an error disable submit 
    if(errorFound1 == true ||errorFound2 == true || errorFound3 == true || errorFound4 == true || errorFound5 == true || errorFound6 == true || errorFound7 == true)
    {
      console.log("There are errors");
      document.querySelector('#signupButton').disabled = true;
    }
    //else enable submit 
    else
    {
       console.log("There are no errors");
       document.querySelector('#signupButton').disabled = false;
    }
  }
  
 
  disabler();
 
   //------------------------------------Checking if firstname meets requirements-----------------------------------------------
  const fn = document.querySelector('#fn');
  
  if(fn.value != "") // if perset value is empty
  {
    errorFound1 = false;
    fn.style.border = "2px solid #40F000";
  }

  fn.addEventListener('keyup', function() { //checks for errors as user types into the field 
    const fnValue = fn.value.trim();
    const error1 = document.querySelector("#signup #error1");
    fn.setAttribute("value", fnValue);

    if (fnValue.length < 2 || fnValue.length > 20) {//parameters are not met indicate error 
      fn.style.border = "2px solid red";
      error1.style.display = "inline";
      error1.innerHTML = "*First Name must have 2-20 characters*";
      errorFound1 = true;

    } 
    
    else { //else indicate success
      fn.style.border = "2px solid #40F000";
      error1.style.display = "none";
      errorFound1 = false;
    }
      disabler();
  });

  //------------------------------------Checking if lastname meets requirements-----------------------------------------------
  const ln = document.querySelector('#ln');
  
  if(ln.value != "")// if perset value is empty
  {
    errorFound2 = false;
    ln.style.border = "2px solid #40F000";
  }
  
  ln.addEventListener('keyup', function() {//checks for errors as user types into the field 
    const lnValue = ln.value.trim();
    const error2 = document.querySelector("#signup #error2");
    ln.setAttribute("value", lnValue);

    if (lnValue.length < 2 || lnValue.length > 20) {//parameters are not met indicate error 
      ln.style.border = "2px solid red";
      error2.style.display = "inline";
      error2.innerHTML = "*Last name must have 2-20 characters*";
      errorFound2 = true;

    } 
    
    else { //else indicate success
      ln.style.border = "2px solid #40F000";
      error2.style.display = "none";
      errorFound2 = false;
    }
        disabler();
  });


  //------------------------------------Checking if city meets requirements-----------------------------------------------
  const city = document.querySelector('#city');
  
  if(city.value != "")// if perset value is empty
  {
    errorFound3 = false;
    city.style.border = "2px solid #40F000";
  }

  city.addEventListener('keyup', function() {//checks for errors as user types into the field 
    const cityValue = city.value.trim();
    const error3 = document.querySelector("#signup #error3");
    city.setAttribute("value", cityValue);

    if (cityValue.length < 2 || cityValue.length > 20) {//parameters are not met indicate error 
      city.style.border = "2px solid red";
      error3.style.display = "inline";
      error3.innerHTML = "*City must have 2-20 characters*";
      errorFound3 = true;

    } 
    
    else { //else indicate success
      city.style.border = "2px solid #40F000";
      error3.style.display = "none";
      errorFound3 = false;
    }
      disabler();
  });

  //-----------------------------------Checking if country meets requirements------------------------------------------------
  const country = document.querySelector('#country');
  
  if(country.value != "")// if perset value is empty
  {
    errorFound4 = false;
    country.style.border = "2px solid #40F000";
  }

  country.addEventListener('keyup', function() {//checks for errors as user types into the field 
    const countryValue = country.value.trim();
    const error4 = document.querySelector("#signup #error4");
    country.setAttribute("value", countryValue);

    if (countryValue.length < 2 || countryValue.length > 20) {//parameters are not met indicate error 
      country.style.border = "2px solid red";
      error4.style.display = "inline";
      error4.innerHTML = "*Country must have 2-20 characters*";
      errorFound4 = true;
    }
    
    else { //else indicate success
      country.style.border = "2px solid #40F000";
      error4.style.display = "none";
      errorFound4 = false;
    }
      disabler();
  });



  //-------------------------------Checking if email meets requirements----------------------------------------------------
  const email = document.querySelector('#email');
  
   if(email.value != "")// if perset value is empty
  {
    errorFound5 = false;
    email.style.border = "2px solid #40F000";
  }
  
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  email.addEventListener('keyup', function() { //checks for errors as user types into the field 
    const emailValue = email.value.trim();
    const error5 = document.querySelector("#signup #error5");
    email.setAttribute("value", emailValue);

    if (emailValue.length > 100 || re.test(emailValue) == false) {//parameters are not met indicate error 
      email.style.border = "2px solid red";
      error5.style.display = "inline";
      error5.innerHTML = "*Email must be valid*";
      errorFound5 = true;

    } 
    
    else { //else indicate success
      email.style.border = "2px solid #40F000";
      error5.style.display = "none";
      errorFound5 = false;
    }
      disabler();
  });


  //-------------------------------------Checking if password meets requirements---------------------------------------------------

  const pw = document.querySelector('#pw');
  var upperCaseLetter = /[A-Z]+/;
  var number = /[0-9]+/;
  let pwValue = "";

  pw.addEventListener('keyup', function() { //checks for errors as user types into the field 
    const error6 = document.querySelector("#signup #error6");
    pwValue = pw.value;

    if (pwValue.length < 8 || upperCaseLetter.test(pwValue) == false || number.test(pwValue) == false) {//parameters are not met indicate error 
      pw.style.border = "2px solid red";
      error6.style.display = "inline";
      error6.innerHTML = "*Password must 8 characters long, and have atleast one number and uppercaseletter*";
      errorFound6 = true;
    } 
    
    else { //else indicate success
      pw.style.border = "2px solid #40F000";
      error6.style.display = "none";
      errorFound6 = false;
    }
      disabler();
  });


  //---------------------------------------Checking if re-typed password matches-------------------------------------------------
  const confPw = document.querySelector('#confPw');

  confPw.addEventListener('keyup', function() { //checks for errors as user types into the field 

    const confPwValue = confPw.value;
    const error7 = document.querySelector("#signup #error7");

    if (confPwValue != pwValue || pwValue.length < 8 || upperCaseLetter.test(pwValue) == false || number.test(pwValue) == false) { //parameters are not met indicate error 
      confPw.style.border = "2px solid red";
      error7.style.display = "inline";
      error7.innerHTML = "*Password not matching*";
      errorFound7 = true;

    } 
    
    else { //else indicate success
      confPw.style.border = "2px solid #40F000";
      error7.style.display = "none";
      errorFound7 = false;
    }
      disabler();
  });

});
