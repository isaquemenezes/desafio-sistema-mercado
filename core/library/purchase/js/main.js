

function showHideDiv() {
    var select = document.getElementById("tipo");
    var vencimentoDiv = document.getElementById("vencimentoDiv");

    console.log('select.value',select.value);

    if (select.value === "financiamento") {
        vencimentoDiv.classList.remove("hidden");
    } else {
        vencimentoDiv.classList.add("hidden");
    }
}