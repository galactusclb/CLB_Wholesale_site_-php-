//////////////////////////////////////
//login check


    function loginCheck(){
      var uname=document.getElementById("uname").value;
      var div_navi = document.getElementById("div-navi");

      if (uname=="") {
        if (screen.width < 850) {
          div_navi.classList.toggle("show");
        }

        document.getElementById("div-popup").style.display="block";
        document.getElementById("div-popup-login").style.display="block";
        return false;
      }else{
        return true;
      }
    }

    function popDivClose() {
      document.getElementById("div-popup").style.display="none";
      document.getElementById("div-popup-login").style.display="none";
    }
