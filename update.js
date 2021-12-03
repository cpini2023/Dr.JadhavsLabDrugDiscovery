function getRegistrationInfo() {
    let name = document.getElementById("Name").value;
    let netID = document.getElementById("netID").value;
    let chemcial = document.getElementById("Chemical").value;
    
    let registrationInfo = [name,netID,chemical,time];
    
    processRegistrationInfo(registrationInfo);
}
function processRegistrationInfo(formArray){
    document.writeln('<p> Thank you for your submission! Here is the information we have gathered from you:</p>');
    document.writeln('<p>Name: ' + formArray[0] + '<br>netID: ' + formArray[1] + '<br>Chemical submitted: ' + formArray[2]  + '</p>');
}