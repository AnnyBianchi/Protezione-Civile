function controllaCampi() {
    var Usercontrol = document.getElementById("user").value;
    var Passcontrol = document.getElementById("pw").value;
   
    // Controlla se entrambi i campi sono vuoti
    if (Usercontrol === "" && Passcontrol === "") {
        alert("Entrambi i campi sono vuoti.");
        return false;
    }
    else if (Usercontrol === "" || Passcontrol === "") {
        alert("Devi compilare entrambi i campi.");
        return false;
    }
    return true;
}