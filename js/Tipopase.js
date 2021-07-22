function Tipopase() {
    var Pass = document.getElementById("cbx_pase");
    if (Pass.value == "1") {
        document.getElementById("Depe").style.visibility="visible";
    } else {
        document.getElementById("Depe").style.visibility="hidden";
    }
}