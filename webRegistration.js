function getRegistrationInfo(){
    let firstName = document.getElementById("Fname").value;
    let lastName = document.getElementById("Lname").value;
    let net = document.getElementById("nID").value;
    let studentEmail = document.getElementById("email").value;
    let studentPassword = document.getElementById("password").value;
    
    let registrationInfo = [firstName,lastName,net,studentEmail,studentPassword];
    
    processRegistrationInfo(registrationInfo);
}
function processRegistrationInfo(formArray){
    document.writeln('<p> Thank you for registering! Here is the information we have gathered from you:</p>');
    document.writeln('<p>Name: ' + formArray[0] + " " + formArray[1] + '<br>netID:' + formArray[2] + '<br>Email(Used for Login): ' + formArray[3] + '<br>Password: Hidden for safety.</p>')
    document.writeln('You can now return to homepage.<br>')
    document.writeln("<a href='index.html'><button>Homepage</button></a>")
}