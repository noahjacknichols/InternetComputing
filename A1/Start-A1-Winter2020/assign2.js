function function3(event){
   
    var similarFields = document.querySelectorAll("input[type=text]");
    for(i = 0; i < similarFields.length; i++){
        if(similarFields[i].value == ""){
            event.preventDefault();
            similarFields[i].style.backgroundColor ="pink";
            similarFields[i].style.borderColor = "red";
            similarFields[i].style.backgroundImage = "url('./images/error.png')";
            similarFields[i].style.backgroundRepeat = "no-repeat";
            similarFields[i].style.backgroundPosition = "right";
        }else {
            similarFields[i].style.backgroundColor = null;
            similarFields[i].style.backgroundimage = null;
            similarFields[i].style.borderColor = null;
            similarFields[i].style.backgroundImage = null;
        }
    }

    var email = document.querySelectorAll("input[type='email']");

    for(i = 0; i < email.length; i++){
        if(email[i].value == ""){
            event.preventDefault();
            email[i].style.backgroundColor = "pink";
            email[i].style.borderColor = "red";
            email[i].style.backgroundImage = "url('./images/error.png')";
            email[i].style.backgroundRepeat = "no-repeat";
            email[i].style.backgroundPosition = "right";
        }else{
            email[i].style.backgroundColor = "";
            email[i].style.borderColor = "";
            email[i].style.backgroundImage = "";
        }
    }

    var password = document.querySelectorAll("input[type='password']");
    for(i = 0; i < password.length; i++){
        if(password[i].value == ""){
            event.preventDefault();
            password[i].style.backgroundColor = "pink";
            password[i].style.borderColor = "red";
            password[i].style.backgroundImage = "url('./images/error.png')";
            password[i].style.backgroundRepeat = "no-repeat";
            password[i].style.backgroundPosition = "right";
        }else {
            password[i].style.backgroundColor = "";
            password[i].style.borderColor = "";
            password[i].style.backgroundImage = "";
        }
    }

    var phone = document.querySelectorAll("input[type='tel']");
    for(i = 0; i < phone.length; i++){
        if(phone[i].value == ""){
            event.preventDefault();
            phone[i].style.backgroundColor = "pink";
            phone[i].style.borderColor = "red";
            phone[i].style.backgroundImage = "url('./images/error.png')";
            phone[i].style.backgroundRepeat = "no-repeat";
            phone[i].style.backgroundPosition = "right";
        }else {
            phone[i].style.backgroundColor = "";
            phone[i].style.borderColor = "";
            phone[i].style.backgroundImage = "";
        }
    }



    var continents = document.querySelectorAll("input[type = 'radio']");
    var isClicked = false;
    for(i = 0; i < continents.length; i++){
        if(continents[i].checked){
            isClicked = true;
        }
    }
    var contDiv = document.querySelector(".continent");
    if(!isClicked){
        event.preventDefault();
        contDiv.style.backgroundColor = "pink";
        contDiv.style.borderColor = "red";
        contDiv.style.backgroundImage = "url('./images/error.png')";
        contDiv.style.backgroundRepeat = "no-repeat";
        contDiv.style.backgroundPosition = "right";
    }else{
        contDiv.style.backgroundColor = "";
        contDiv.style.borderColor = "";
        contDiv.style.backgroundImage = "";
    }
    var agreeDiv = document.querySelector(".agreeDiv");
    var termAgree = document.querySelector("input[name = 'agreement']");
    if(!termAgree.checked){
        event.preventDefault();
        agreeDiv.style.backgroundColor = "pink";
        agreeDiv.bordercolor = "red";
        agreeDiv.style.backgroundImage = "url('./images/error.png')";
        agreeDiv.style.backgroundRepeat = "no-repeat";
        agreeDiv.style.backgroundPosition = "right";
        var alreadyError = document.querySelector(".errors");
        console.log(alreadyError.childNodes.length);
        if(alreadyError.childNodes.length < 1){
            var node = document.createElement("P");
            var textnode = document.createTextNode("Error, please agree to the terms of service.");
            node.appendChild(textnode);
            alreadyError.appendChild(node);
        }
    } else {
        agreeDiv.style.backgroundColor = "";
        agreeDiv.style.borderColor = "";
        agreeDiv.style.backgroundImage = "";
        var alreadyError = document.querySelector(".errors");
        if(alreadyError.childNodes.length > 0){
            alreadyError.removeChild(alreadyError.lastElementChild);
        }
    }
}


function function1(){
    var similarProduct = document.querySelectorAll(".recommendedBlocks");
    for(i = 0; i < similarProduct.length; i++){
        var image = similarProduct[i].querySelector("img");
        image.addEventListener("mouseover",
            function(event) {
                var target = event.target;
                target.style.transform = "scale(1.5, 1.5)";
        });
        image.addEventListener("mouseout",
            function(event){
                var target = event.target;
                target.style.transform = "scale(1,1)";
        });

    }
}







