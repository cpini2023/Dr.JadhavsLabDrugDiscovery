

function getFormInfo(){
	//get all form info
	let fullName = document.getElementById("fullname").value;
	let qualifications = document.getElementById("txtList").value;
    let resume = document.getElementById("myfile").value;
	let numofdays = document.getElementById("numofDays").value;
	let email = document.getElementById("email").value;
	let tel = document.getElementById("tel").value;
	let url = document.getElementById("url").value;
	
    //let RegistrationTime = document.getElementById("orderTime").value;,
    
    //get the local time and stor it in the array
	var currentTime = new Date();
	let RegistrationTime = currentTime.toLocaleString();
    


	// create a JSON object to carry the address info
	let address = {streetName: document.getElementById("streetName").value, apartmentNumber:document.getElementById("apartmentNumber").value, city:document.getElementById("city").value, state:document.getElementById("state").value, zip:document.getElementById("zip").value};


	//create an array to hold all the form informaiton
	let formInfo = [fullName, qualifications, resume, numofdays, email, tel, url, RegistrationTime, address.streetName, address.apartmentNumber, address.city, address.state, address.zip];
	
	//pass the array to processFormInfo() function	
	processFormInfo(formInfo);
}



function processFormInfo(formArray){


	document.writeln('<p>Thank you! ' + formArray[0] + ' for registering your interest in volunteer position in our Lab. We will contact you soon. <p>');  

	document.writeln('<p>Registration Details: </br>' + 'Qualifications: ' + formArray[1] + ' </br> Resume: ' +formArray[2] + '</br>No Of Days: ' +formArray[3] + '</br> Email address is:  ' + formArray[4] + '</br> Telephone Number is: '  + formArray[5] + '</br> You heard about us from: ' + formArray[6] + '<br> Your registration time is: ' + formArray[7] + '</p>');
    
	document.writeln('<p> Your address is: </br>' + formArray[8] + '</br>' + formArray[9] + '</br>' + formArray[10] + '</br>' + formArray[11] + '</br>' + formArray[12] + '</br>' + '</p>');
}


