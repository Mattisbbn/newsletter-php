function copyText() {
    let emails = document.querySelectorAll('.email');
    let emailText = "";
    emails.forEach(function(email) {
        emailText += email.textContent + " "; 
    });
    navigator.clipboard.writeText(emailText);
}
