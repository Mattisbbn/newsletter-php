function copyText() {
    let emails = document.querySelectorAll('.email');
    let emailText = "";
    let disabledMails = document.querySelectorAll('span[disabled="true"]');
    emails.forEach(function(email) {
       
        emailText += email.textContent + " "; 
    });
    navigator.clipboard.writeText(emailText);
}



