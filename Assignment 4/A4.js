function validateForm() 
{
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
      alert("First name must be filled out");
      return false;
    }

    var y = document.forms["myForm"]["lname"].value;
    if (y == "") {
      alert("Last name must be filled out");
      return false;
    }

    var z = document.forms["myForm"]["address"].value;
    if (z == "") {
      alert("Address must be filled out");
      return false;
    }
    var w = document.getElementById("myForm");
    w.addEventListener("blur", myBlurFunction, true);  
    function myBlurFunction() 
    {
        document.getElementById("fname").style.backgroundColor = "blue";
    }
  }

  