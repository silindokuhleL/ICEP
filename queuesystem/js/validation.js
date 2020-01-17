function validateStudentNumber() {
    var studentNumber = document.getElementById("studentNumber").value;
    document.getElementById("studentNumber").innerHTML = document.getElementById("studentNumber").innerHTML;
    document.getElementById("studentNumber").style.color = "black";

	if (studentNumber > 0) {
		if (studentNumber.length == 9) {
			document.getElementById("lblStudentNumber").innerHTML = "Student number is correct";
			document.getElementById("studentNumber").style.color = "black";
			document.getElementById("lblStudentNumber").style.color = "green";
			return true;
		} else {
			document.getElementById("lblStudentNumber").innerHTML = "*** Valid Student number must have 9 digits";
			document.getElementById("studentNumber").style.color = "red";
			document.getElementById("lblStudentNumber").style.color = "red";
			return false;
		}
	} else {
		document.getElementById("lblStudentNumber").innerHTML = "*** Valid Student number is required";
		document.getElementById("studentNumber").style.color = "red";
		document.getElementById("lblStudentNumber").style.color = "red";
		return false;
	}
    
}

function validateStaffNumber() {
    var studentNumber = document.getElementById("studentNumber").value;
    document.getElementById("studentNumber").innerHTML = document.getElementById("studentNumber").innerHTML;
    document.getElementById("studentNumber").style.color = "black";

	if (studentNumber > 0) {
		if (studentNumber.length == 5) {
			document.getElementById("lblStudentNumber").innerHTML = "Staff number is correct";
			document.getElementById("studentNumber").style.color = "green";
			document.getElementById("lblStudentNumber").style.color = "green";
			return true;
		} else {
			document.getElementById("lblStudentNumber").innerHTML = "*** Valid Staff number must have 5 digits";
			document.getElementById("studentNumber").style.color = "red";
			document.getElementById("lblStudentNumber").style.color = "red";
			return false;
		}
	} else {
		document.getElementById("lblStudentNumber").innerHTML = "*** Valid Staff number is required";
		document.getElementById("studentNumber").style.color = "red";
		document.getElementById("lblStudentNumber").style.color = "red";
		return false;
	}
    
}

function validateStudentAmount() {
    var amount = document.getElementById("amount").value;
    document.getElementById("amount").innerHTML = document.getElementById("amount").innerHTML;
    document.getElementById("amount").style.color = "black";
	document.getElementById("amount").value.innerHTML = "900";
    if (amount < 100) {
        document.getElementById("lblAmount").innerHTML = "*** Student allowance atleast R100.00";
        document.getElementById("amount").style.color = "red";
        document.getElementById("lblAmount").style.color = "red";
        return false;
    } else if (amount > 5000) {
        document.getElementById("lblAmount").innerHTML = "*** Student allowance must not exceed R5000.00";
        document.getElementById("amount").style.color = "red";
        document.getElementById("lblAmount").style.color = "red";
        return false;
    } else {
        document.getElementById("lblAmount").innerHTML = "Student allowance is correct";
        document.getElementById("amount").style.color = "green";
        document.getElementById("lblAmount").style.color = "green";
        return true;
    }
}

function validateAmountPayment() {
    var accountBalance = parseInt(document.getElementById("accountBalance").value);
    var amountSpent = parseInt(document.getElementById("amountSpent").value);
    document.getElementById("amountSpent").innerHTML = document.getElementById("amountSpent").innerHTML;
    document.getElementById("amountSpent").style.color = "black";
	if (accountBalance > 0) {
		if (amountSpent > 0) {
			if (accountBalance >= amountSpent) {
				document.getElementById("lblAmountSpent").innerHTML = "Ready to load transaction";
				document.getElementById("amountSpent").style.color = "green";
				document.getElementById("lblAmountSpent").style.color = "green";
				return true;
			} else {
				document.getElementById("lblAmountSpent").innerHTML = "***You have insufficient money";
				document.getElementById("amountSpent").style.color = "red";
				document.getElementById("lblAmountSpent").style.color = "red";
				return false;
			}
		} else {
			document.getElementById("lblAmountSpent").innerHTML = "***Item price must be bigger than zero";
			document.getElementById("amountSpent").style.color = "red";
			document.getElementById("lblAmountSpent").style.color = "red";
			return false;
		}
	} else {
		document.getElementById("lblAmountSpent").innerHTML = "***You have insufficient money";
		document.getElementById("amountSpent").style.color = "red";
		document.getElementById("lblAmountSpent").style.color = "red";
		return false;
	}
}


function validateName() {
    var name = document.getElementById("name").value;
    document.getElementById("name").innerHTML = document.getElementById("name").innerHTML;
    document.getElementById("name").style.color = "black";

    if (name.length < 2) {
        document.getElementById("lblName").innerHTML = "**** Name is required";
        document.getElementById("name").style.color = "red";
        document.getElementById("lblName").style.color = "red";
        return false;
    } else if (name.length > 30) {
        document.getElementById("lblName").innerHTML = "**** Name is too long";
        document.getElementById("lblName").style.color = "red";
        document.getElementById("name").style.color = "red";
        return false;
    } else {
		var re = /^[A-Za-z]+$/;
		if (re.test(name)) {
			document.getElementById("lblName").innerHTML = "Ok";
			document.getElementById("lblName").style.color = "green";
			document.getElementById("name").style.color = "black";
			return true;
		} else {
			document.getElementById("lblName").innerHTML = "**** Name contain invalid character";
			document.getElementById("lblName").style.color = "red";
			document.getElementById("name").style.color = "red";
			return false;
		}
		
	}
   

}

function validateLastname() {
    var surname = document.getElementById("lastname").value;

    if (surname.length < 2) {
        document.getElementById("lastname").innerHTML = document.getElementById("lastname").innerHTML;
        document.getElementById("lastname").style.color = "red";

        return false;
    } else if (surname.length > 30) {
        document.getElementById("lblLastname").innerHTML = "**** Surname is too long";
        document.getElementById("lastname").style.color = "red";
        document.getElementById("lblLastname").style.color = "red";
        return false;
    } else {
		var re = /^[A-Za-z]+$/;
		if (re.test(surname)) {
			document.getElementById("lblLastname").innerHTML = "Ok";
			document.getElementById("lblLastname").style.color = "green";
			document.getElementById("lastname").style.color = "black";
			return true;
		} else {
			document.getElementById("lblLastname").innerHTML = "**** Lastname contain invalid character";
			document.getElementById("lblLastname").style.color = "red";
			document.getElementById("lastname").style.color = "red";
			return false;
		}
    }
}

function validateCellNO() {
    var phone = document.getElementById("cellNO").value;
    var start = phone.split('');
	var saCode = start[0] + start[1] + start[2];
	
	console.log(phone.length);
	if (start[0] == 0) {
		if (phone.length == 10) {
			document.getElementById("lblCellNO").innerHTML = "Ok";
			document.getElementById("lblCellNO").style.color = "green";
			document.getElementById("cellNO").style.color = "black";
			return true;
		} else {
			document.getElementById("lblCellNO").innerHTML = "**** Valid phone number is required";
			document.getElementById("lblCellNO").style.color = "red";
			document.getElementById("cellNO").style.color = "red";
			return false;
		}
	} else if (saCode == "+27"){
		if (phone.length == 12) {
			document.getElementById("lblCellNO").innerHTML = "Ok";
			document.getElementById("lblCellNO").style.color = "green";
			document.getElementById("cellNO").style.color = "black";
			return true;
		} else {
			document.getElementById("lblCellNO").innerHTML = "**** Valid phone number is required";
			document.getElementById("lblCellNO").style.color = "red";
			document.getElementById("cellNO").style.color = "red";
			return false;
		}
	} else {
		document.getElementById("lblCellNO").innerHTML = "**** Valid phone number must start with 0 or +27";
		document.getElementById("lblCellNO").style.color = "red";
		document.getElementById("cellNO").style.color = "red";
		return false;
	}
}

function validateEmail() {
    var email = document.getElementById("email").value;

    if (!email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
        document.getElementById("lblEmail").innerHTML = "**** Please provide a valid email address";
        document.getElementById("lblEmail").style.color = "red";
        return false;
    } else {
        document.getElementById("lblEmail").innerHTML = "Ok";
        document.getElementById("lblEmail").style.color = "green";
    }
}

function validatePassword() {
    var password = document.getElementById("password").value;

    if (password.length < 5) {
        document.getElementById("lblPassword").innerHTML = "**** Password should contain atleast 5 characters";
        document.getElementById("lblPassword").style.color = "red";
        return false;
    }
    if (password.length > 20) {
        document.getElementById("lblPassword").innerHTML = "**** Password should not contain more than 20 characters";
        document.getElementById("lblPassword").style.color = "red";
        return false;
    } else {
        document.getElementById("lblPassword").innerHTML = "**** Ok";
        document.getElementById("lblPassword").style.color = "green";
        return true;
    }
}

function validatePasswordMatch() {
    var password = document.getElementById("password").value;
    var confirm = document.getElementById("confirmPassword").value;

    if (confirm == password) {
        document.getElementById("lblConfirm").innerHTML = "Ok";
        document.getElementById("lblConfirm").style.color = "green";

        return true;
    } else {
        document.getElementById("lblConfirm").innerHTML = "**** Passwords do not match";
        document.getElementById("lblConfirm").style.color = "red";
        return false;
    }
}

function validateSubject() {
    var subject = document.getElementById("subject").value;

    if (subject.length < 5) {
        document.getElementById("subject").innerHTML = document.getElementById("subject").innerHTML;
        document.getElementById("subject").style.color = "red";

        return false;
    }
    if (subject.length > 100) {
        document.getElementById("lblSubject").innerHTML = "****Subject is too long";
        document.getElementById("subject").style.color = "red";
        document.getElementById("lblSubject").style.color = "red";
        return false;
    } else {
        document.getElementById("lblSubject").innerHTML = "Ok";
        document.getElementById("lblSubject").style.color = "green";
        document.getElementById("subject").style.color = "black";
        return true;
    }
}

function validateId() {
    var id = document.getElementById("id").value;

    if (id.length != 13) {
        document.getElementById("lblId").innerHTML = "Valid ID number is required";
        document.getElementById("lblId").style.color = "red";
        return false;
    } else {
        var elements = id.split('');
        var gender = parseInt(elements[6]);
        var year = parseInt(elements[0]) + parseInt(elements[1]);
        var month = parseInt(elements[2]) + "" + parseInt(elements[3]);
        var day = parseInt(elements[4]) + "" + parseInt(elements[5]);

        if (year >= 0) {

            if (month >= 1 && month <= 12) {
                if (day >= 1 && day <= 31) {
                    if (gender >= 0 && gender <= 4) {
                        document.getElementById("lblId").innerHTML = "Gender: Female";
                        document.getElementById("lblId").style.color = "green";
                        return true;
                    } else {
                        document.getElementById("lblId").innerHTML = "Gender: Male and DOB: " + day + "-" + month + "-" + elements[0] + elements[1];
                        document.getElementById("lblId").style.color = "green";
                        return true;
                    }

                } else {
                    document.getElementById("lblId").innerHTML = "Invalid day of birth on the ID number";
                    document.getElementById("lblId").style.color = "red";
                    return false;
                }
            } else {
                document.getElementById("lblId").innerHTML = "Invalid month on the ID number";
                document.getElementById("lblId").style.color = "red";
                return false;
            }


        } else {
            document.getElementById("lblId").innerHTML = "Invalid year on the ID number";
            document.getElementById("lblId").style.color = "red";
            return false;
        }



    }
}

function validateMessage() {
    var message = document.getElementById("message").value;

    if (message.length < 10) {
        document.getElementById("message").innerHTML = document.getElementById("message").innerHTML;
        document.getElementById("message").style.color = "red";

        return false;
    }
    if (message.length > 1000) {
        document.getElementById("lblMessage").innerHTML = "****Message is too long";
        document.getElementById("message").style.color = "red";
        document.getElementById("lblMessage").style.color = "red";
        return false;
    } else {
        document.getElementById("lblMessage").innerHTML = "Ok";
        document.getElementById("lblMessage").style.color = "green";
        document.getElementById("message").style.color = "black";
        return true;
    }
}

function validateContanct() {
    if (validateEmail() && validateMessage() && validateName()) {
        return true;
    } else {
        return false;
    }
}