function validateForm() {
    let quantities = document.querySelectorAll('select[name^="qty"]');
    let firstName = document.getElementById("firstName").value.trim();
    let lastName = document.getElementById("lastName").value.trim();
    let itemSelected = false;

    for (let i = 0; i < quantities.length; i++) {
        if (parseInt(quantities[i].value) > 0) {
            itemSelected = true;
            break;
        }
    }

    if (!itemSelected) {
        alert("Please order at least one item.");
        return false;
    }

    if (firstName === "" || lastName === "") {
        alert("Please enter your full name.");
        return false;
    }

    // Calculate pickup time (20 minutes from now)
    let now = new Date();
    now.setMinutes(now.getMinutes() + 20);
    let timeStr = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    document.getElementById("pickupTime").value = timeStr;

    return true;
}
