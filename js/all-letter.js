function allLetter(inputtxt)
      { 
      var letters = /^[A-Za-z]+$/;
      if(inputtxt.value.match(letters))
      {
      return true;
      }
      else
      {
      alert('Please input alphabet characters only');
      return false;
      }
      }