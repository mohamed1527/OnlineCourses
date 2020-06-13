var inputFirstName = $('#inputFirstName'),
    inputLastName = $('#inputLastName'),
    inputEmail = $('#inputEmail'),
    inputPassword = $('#inputPassword'),
    inputConfirmPassword = $('#inputConfirmPassword'),
    inputPhoneNumber = $('#inputPhoneNumber'),
    inputBirthDate = $('#inputBirthDate'),
    inputBio = $('#inputBio'),
    inputPriority = $('#inputPriority'),
    checkAgreement = $('#checkAgreement'),
    editButton = $('#editButton'),
    cancelButton = $("#cancelButton"),
    submitSignUp = $("#submitSignUp"),
    nameFormat = /^[a-zA-Z]+$/,
    emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
    passwordFormat = /^(?=.-*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/,
    bioFormat = /[^A-Za-z0-9&#!?:;,.-]/,
    isEditPage = false,
    isAdminEdit = false,
    adminEditUserId = 0,
    userPriority = 3;


inputFirstName.keyup(function(){
    validateFirstName();
});

inputLastName.keyup(function(){
    validateLastName();
});

inputEmail.keyup(function(){
    validateEmail();
});

inputPassword.keyup(function(){
    validatePassword();
});

inputConfirmPassword.keyup(function(){
    validateConfirmPassword();
});

inputPhoneNumber.keyup(function(){
    validatePhoneNumber();
});

inputBirthDate.change(function(){
    validateBirthDate();
});

inputBio.keyup(function(){
    validateBio();
});

checkAgreement.change(function(){
    validateAgreement();
});

function validateFirstName(){
    if((inputFirstName.val().length < 3) || (!inputFirstName.val().match(nameFormat))){
        inputFirstName.addClass("invalid");
        inputFirstName.focus();
        $('#firstNameInvalid').removeClass("hidden");
        return false; 
    }else{
        inputFirstName.removeClass("invalid");
        $('#firstNameInvalid').addClass("hidden");
        return true;
    }
}

function validateLastName(){
    if((inputLastName.val().length < 3) || (!inputLastName.val().match(nameFormat))){
        inputLastName.addClass("invalid");
        inputLastName.focus();
        $('#lastNameInvalid').removeClass("hidden");
        return false; 
    }else{
        inputLastName.removeClass("invalid");
        $('#lastNameInvalid').addClass("hidden");
        return true;
    }
}

function validateEmail(){
    $('#emailExists').addClass("hidden");
    if(!inputEmail.val().match(emailFormat)){
        inputEmail.addClass("invalid");
        inputEmail.focus();
        $('#emailInvalid').removeClass("hidden");
        return false; 
    }else{
        inputEmail.removeClass("invalid");
        $('#emailInvalid').addClass("hidden");
        return true;
    }
}

function validatePassword(){
    if(!(isEditPage && inputPassword.val() == "")){
        if(!inputPassword.val().match(passwordFormat)){
            inputPassword.addClass("invalid");
            inputPassword.focus();
            return false;
        }else{
            inputPassword.removeClass("invalid");
            return true;
        }
    }else{
        inputPassword.removeClass("invalid");
        return true;
    }
}

function validateConfirmPassword(){
    if(!(isEditPage && inputPassword.val() == "")){
        if(inputConfirmPassword.val() != inputPassword.val() || inputConfirmPassword.val().length < 8){
            inputConfirmPassword.addClass("invalid");
            inputConfirmPassword.focus();
            $('#passwordInvalid').removeClass("hidden");
            return false;
        }else{
            inputConfirmPassword.removeClass("invalid");
            $('#passwordInvalid').addClass("hidden");
            return true;
        }
    }else{
        inputConfirmPassword.removeClass("invalid");
        $('#passwordInvalid').addClass("hidden");
        return true;
    }
}

function validatePhoneNumber(){
    $('#phoneNumberExists').addClass("hidden");
    if(inputPhoneNumber.val().length != 11){
        inputPhoneNumber.addClass("invalid");
        inputPhoneNumber.focus();
        $('#phoneNumberInvalid').removeClass("hidden");
        return false; 
    }else{
        inputPhoneNumber.removeClass("invalid");
        $('#phoneNumberInvalid').addClass("hidden");
        return true;
    }
}

function validateBirthDate(){
    if((inputBirthDate.val().length < 1) || (getAge(inputBirthDate.val()) < 10)){
        inputBirthDate.addClass("invalid");
        inputBirthDate.focus();
        $('#birthDateInvalid').removeClass("hidden");
        return false;
    }else{
        inputBirthDate.removeClass("invalid");
        $('#birthDateInvalid').addClass("hidden");
        return true;
    }
}

function validateBio(){
    if(isEditPage){
        if((inputBio.val().length != 0) && false){//(inputBio.val().match(bioFormat))){ ////////////////// NEEDS VALIDATION
            inputBio.addClass("invalid");
            inputBio.focus();
            $('#bioInvalid').removeClass("hidden");
            return false; 
        }else{
            inputBio.removeClass("invalid");
            $('#bioInvalid').addClass("hidden");
            return true;
        }
    }else{
        return true;
    }
}

function getAge(currBirthDate) {
    var today = new Date();
    var birthDate = new Date(currBirthDate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function validateAgreement(){
    if(!checkAgreement.is(":checked")){
        checkAgreement.focus();
        $('#checkAgreementInvalid').removeClass("hidden");
        return false;
    }else{
        $('#checkAgreementInvalid').addClass("hidden");
        return true;
    }
}

function editorEdit(currUserId,currUserPriority){
    isEditPage = true;
    isAdminEdit = true;
    adminEditUserId = parseInt(currUserId);
    userPriority = currUserPriority;
}

inputPriority.change(function(){
    userPriority = inputPriority.val();
});

editButton.click(function(){
    cancelButton.removeClass("hidden");
    editButton.addClass("hidden");
    inputPassword.removeClass("hidden");
    inputConfirmPassword.removeClass("hidden");
    $("#passHelp").removeClass("hidden");
    submitSignUp.removeClass("hidden");
    inputFirstName.removeAttr("readonly");
    inputLastName.removeAttr("readonly");
    inputEmail.removeAttr("readonly");
    inputPassword.removeAttr("readonly");
    inputConfirmPassword.removeAttr("readonly");
    inputPhoneNumber.removeAttr("readonly");
    inputBirthDate.removeAttr("readonly");
    inputBio.removeAttr("readonly");
    isEditPage = true;
});

cancelButton.click(function(){
    location.reload();
});

submitSignUp.click(function(){

    var isValidData = validateFirstName() && validateLastName() && validateEmail() && validatePassword() && validateConfirmPassword() && validatePhoneNumber() && validateBirthDate();
    
    if(!isEditPage){
        isValidData = isValidData && validateAgreement();
    }else{
        isValidData = isValidData && validateBio();
    }
    
    if(isValidData){
        var userFirstName = inputFirstName.val();
        var userLastName = inputLastName.val();
        var userEmail = inputEmail.val();
        var userPassword = inputPassword.val();
        var userPhoneNumber = inputPhoneNumber.val();
        var userBirthDate = inputBirthDate.val();
        var userBio = "";

        if(isEditPage){
            userBio = inputBio.val();
        }

        if(isEditPage && userPassword == ""){
            userPassword = "sPass";
        }
        
        var request = $.post('../../assets/files/signupRequest.php', { firstName: userFirstName, lastName: userLastName ,email: userEmail, password: userPassword, phonenumber: userPhoneNumber, birthDate: userBirthDate, isEditPage: isEditPage, bio: userBio, isAdminEdit: isAdminEdit, adminEditUserId: adminEditUserId, userPriority: userPriority });
        request.done(function(data)
        {
            if(data == "email exists"){
                inputEmail.addClass("invalid");
                $('#emailExists').removeClass("hidden");
            }else if(data == "phonenumber exists"){
                inputPhoneNumber.addClass("invalid");
                $('#phoneNumberExists').removeClass("hidden");
            }else{
                if(isAdminEdit){
                    document.getElementById("closeEditUserModal").click();
                    userSaved();
                }
                inputEmail.removeClass("invalid");
                inputPhoneNumber.removeClass("invalid");
                $('#emailExists').addClass("hidden");
                $('#phoneNumberExists').addClass("hidden");
                $("#response").html(data);
                $("#responseButton").click();
            }
        });
    }
});