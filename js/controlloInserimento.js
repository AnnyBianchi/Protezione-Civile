let checkbox = document.getElementById("flexCheckDefault");
      checkbox.addEventListener( "change", () => {
         if ( txtCoordinatax.text == 'null' && txtCoordinatay.text == 'null' && txtDescrizione.text == 'null' && Acc.text == 'null') {
            text.innerHTML = " Non ha inserito niente";
         }
      });