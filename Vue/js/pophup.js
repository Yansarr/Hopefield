const viewPopUp = {
    popup : document.querySelector(".login-popup"),
    closeButton : document.querySelector(".login-popup .cancel"),
    cookieAgreement: document.querySelector(".form-container"),
    checkbox: document.querySelector(".checkbox")
}
try {
    viewPopUp.closeButton.addEventListener("click", () => {
        viewPopUp.popup.remove();
    })
} catch (e) {
    console.log("Could not find close button for the popup");
}

try {
    //If cookie argreement is not in local storage, meaning they did not accept cgu
    if (!localStorage.getItem("cookie_agreement")) {
        //Show the popup
        viewPopUp.popup.classList.remove("hidden");
        //Add event on checkbox, to allow click on validate Button when checked
        viewPopUp.checkbox.addEventListener("click", () => {
            if(viewPopUp.checkbox.checked){
                viewPopUp.cookieAgreement.classList.remove("accept");
            }else{
                viewPopUp.cookieAgreement.classList.add("accept");
            }
        })
        //add event when validate is clicked
        viewPopUp.cookieAgreement.addEventListener("click", () => {
            if (viewPopUp.checkbox.checked) {
                viewPopUp.checkbox
                window.localStorage.setItem("cookie_agreement", "true");
                viewPopUp.popup.remove();
            }else{}
        })
    }
} catch (e) {
    console.log("Could not get the cookie agreement button");
}