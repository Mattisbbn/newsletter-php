function copyText() {
    let emails = document.querySelectorAll('.email');
    let emailText = "";
    emails.forEach(function(email) {
        if (email.getAttribute('disabled') == 0) {
            emailText += email.textContent + " ";
        }
    });
    navigator.clipboard.writeText(emailText);
}



