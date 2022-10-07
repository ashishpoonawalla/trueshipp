/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


<!--
    
    var fontColor=null;
    var errorFontColor="red";
    
	// Checks whether given string is empty or null
	function isEmpty(text){
        return (text==null || text.toString().length==0);
    }
    
    function unsetAttribute(element,attr){
		if(element.getAttribute(attr)!=null){
			element.removeAttribute(attr);
		}
	}

    /* Login Validator */
    function checkLoginForm(){
     	var error=false;
        var username=document.loginForm.username;
        var password=document.loginForm.password;
		var usernameLbl=document.getElementById("usernameLbl");
		var passwordLbl=document.getElementById("passwordLbl");
		
        if(isEmpty(username.value)){
            fontColor=usernameLbl.style.color;
            usernameLbl.style.color=errorFontColor;
            username.focus();
            error=true;
        }
		
		if(isEmpty(password.value)){
           	fontColor=passwordLbl.style.color;
            passwordLbl.style.color=errorFontColor;
            if(error==false) password.focus();
            error=true;
            
        }
        return !error;
    }
    
    function unsetLoginError(resetForm){
		var username=document.loginForm.username;
        var password=document.loginForm.password;
        var usernameLbl=document.getElementById("usernameLbl");
		var passwordLbl=document.getElementById("passwordLbl");
        
		if(resetForm || !isEmpty(username.value)){
			if(usernameLbl.style.color==errorFontColor)
			 usernameLbl.style.color=fontColor;
		}
		
		if(resetForm || !isEmpty(password.value)){
			if(passwordLbl.style.color==errorFontColor)
			 passwordLbl.style.color=fontColor;
		}
		
		if(resetForm){
			username.focus();
		}
	}
    
    /* End of Login Validator */

    /* Registration form Validator */
    
    function addNewCarrier(selectedCarrier){
     	var newCarrier=document.getElementById("newCarrier");
     	if(selectedCarrier!=null && selectedCarrier==0){
			newCarrier.innerHTML="<input type='text' id='otherCarrier' name='otherCarrier' style='width: 100%;' onkeypress='unsetRegisterError(false);' />";
			document.getElementById("otherCarrier").focus();
		}else{
			newCarrier.innerHTML="";
		}
	}
	
	function addNewSecQues(selectedQues){
		var newSecQues=document.getElementById("newSecQues");
     	if(selectedQues!=null && selectedQues=="0"){
			newSecQues.innerHTML="<input type='text' id='otherSecQues' name='otherSecQues' style='width: 100%;' onkeypress='unsetRegisterError(false);' />";
			document.getElementById("otherSecQues").focus();
		}else{
			newSecQues.innerHTML="";
		}
	}
	
    function checkRegisterForm(){
        var error=false;
        var username=document.registerForm.username;
        var password=document.registerForm.password;
        var firstname=document.registerForm.firstname;
        var lastname=document.registerForm.lastname;
        var email=document.registerForm.email;
        var mobile=document.registerForm.mobile;
        var carrier=document.registerForm.carrier;
        var otherCarrier=document.registerForm.otherCarrier;
        var secQues=document.registerForm.secQues;
        var otherSecQues=document.registerForm.otherSecQues;
        var ans=document.registerForm.ans;
        var tnc=document.registerForm.tnc;
        
        var usernameLbl=document.getElementById("usernameLbl");
        var passwordLbl=document.getElementById("passwordLbl");
        var firstnameLbl=document.getElementById("firstnameLbl");
        var lastnameLbl=document.getElementById("lastnameLbl");
        var emailLbl=document.getElementById("emailLbl");
        var mobileLbl=document.getElementById("mobileLbl");
        var carrierLbl=document.getElementById("carrierLbl");
        var emailLbl=document.getElementById("emailLbl");
        var secQuesLbl=document.getElementById("secQuesLbl");
        var ansLbl=document.getElementById("ansLbl");
        var tncLbl=document.getElementById("tncLbl");
        
        if(isEmpty(username.value)){
         	if(usernameLbl.style.color!=errorFontColor){
         		fontColor=usernameLbl.style.color;
				usernameLbl.style.color=errorFontColor;
			}
			username.focus();
			error=true;
		}
		
		if(isEmpty(password.value)){
			if(passwordLbl.style.color!=errorFontColor){
				fontColor=passwordLbl.style.color;
				passwordLbl.style.color=errorFontColor;
			}
			if(error==false) password.focus();
			error=true;
		}
		
		if(isEmpty(firstname.value)){
			if(firstnameLbl.style.color!=errorFontColor){
				fontColor=firstnameLbl.style.color;
				firstnameLbl.style.color=errorFontColor;
			}
			if(error==false) firstname.focus();
			error=true;
		}
		
		if(isEmpty(lastname.value)){
		 	if(lastnameLbl.style.color!=errorFontColor){
				fontColor=lastnameLbl.style.color;
				lastnameLbl.style.color=errorFontColor;
			}
			if(error==false) lastname.focus();
			error=true;
		}
		
		if(isEmpty(email.value)){
		 	if(emailLbl.style.color!=errorFontColor){
				fontColor=emailLbl.style.color;
				emailLbl.style.color=errorFontColor;
			}
			if(error==false) email.focus();
			error=true;
		}
		
		if(isEmpty(mobile.value)){
			if(mobileLbl.style.color!=errorFontColor){
				fontColor=mobileLbl.style.color;
				mobileLbl.style.color=errorFontColor;
			}
			if(error==false) mobile.focus();
			error=true;
		}
		
		if(carrier.value==-1){
			if(carrierLbl.style.color!=errorFontColor){
				fontColor=carrierLbl.style.color;
				carrierLbl.style.color=errorFontColor;
			}
			if(error==false) carrier.focus();
			error=true;
		}else if(carrier.value==0 && isEmpty(otherCarrier.value)){
			if(carrierLbl.style.color!=errorFontColor){
				fontColor=carrierLbl.style.color;
				carrierLbl.style.color=errorFontColor;
				otherCarrier.value="Enter New Carrier...";
				otherCarrier.select();
			}
			if(error==false) otherCarrier.focus();
			error=true;
		}
		
		
		if(secQues.value==-1){
			if(secQuesLbl.style.color!=errorFontColor){
				fontColor=secQuesLbl.style.color;
				secQuesLbl.style.color=errorFontColor;
			}
			if(error==false) secQues.focus();
			error=true;
		}else if(secQues.value==0 && isEmpty(otherSecQues.value)){
			if(secQuesLbl.style.color!=errorFontColor){
				fontColor=secQuesLbl.style.color;
				secQuesLbl.style.color=errorFontColor;
				otherSecQues.value="New Question...";
				otherSecQues.select();
			}
			if(error==false) otherSecQues.focus();
			error=true;
		}
		
		if(isEmpty(ans.value)){
			if(ansLbl.style.color!=errorFontColor){
				fontColor=ansLbl.style.color;
				ansLbl.style.color=errorFontColor;
			}
			if(error==false) ans.focus();
			error=true;
		}
		
		if(!tnc.checked){
			if(tncLbl.style.color!=errorFontColor){
				fontColor=tncLbl.style.color;
				tncLbl.style.color=errorFontColor;
			}
			if(error==false) tnc.focus();
			error=true;
		}
		
        return !error;
    }
    
	function unsetRegisterError(resetForm){
		var error=false;
        var username=document.registerForm.username;
        var password=document.registerForm.password;
        var firstname=document.registerForm.firstname;
        var lastname=document.registerForm.lastname;
        var email=document.registerForm.email;
        var mobile=document.registerForm.mobile;
        var carrier=document.registerForm.carrier;
        var otherCarrier=document.registerForm.otherCarrier;
        var secQues=document.registerForm.secQues;
        var otherSecQues=document.registerForm.otherSecQues;
        var ans=document.registerForm.ans;
        var tnc=document.registerForm.tnc;
        
        var usernameLbl=document.getElementById("usernameLbl");
        var passwordLbl=document.getElementById("passwordLbl");
        var firstnameLbl=document.getElementById("firstnameLbl");
        var lastnameLbl=document.getElementById("lastnameLbl");
        var emailLbl=document.getElementById("emailLbl");
        var mobileLbl=document.getElementById("mobileLbl");
        var carrierLbl=document.getElementById("carrierLbl");
        var emailLbl=document.getElementById("emailLbl");
        var secQuesLbl=document.getElementById("secQuesLbl");
        var ansLbl=document.getElementById("ansLbl");
        var tncLbl=document.getElementById("tncLbl");
		
		if(resetForm || !isEmpty(username.value) && usernameLbl.style.color==errorFontColor)
		 usernameLbl.style.color=fontColor;
		
		if(resetForm || !isEmpty(password.value) && passwordLbl.style.color==errorFontColor)
		 passwordLbl.style.color=fontColor;
		
		if(resetForm || !isEmpty(firstname.value) && firstnameLbl.style.color==errorFontColor)
		 firstnameLbl.style.color=fontColor;
		
		if(resetForm || !isEmpty(lastname.value) && lastnameLbl.style.color==errorFontColor)
		 lastnameLbl.style.color=fontColor;
		
		if(resetForm || !isEmpty(email.value) && emailLbl.style.color==errorFontColor)
		 emailLbl.style.color=fontColor;
		
		if(resetForm || !isEmpty(mobile.value) && mobileLbl.style.color==errorFontColor)
		 mobileLbl.style.color=fontColor;
		
		if(resetForm || carrier.value!=-1 && carrierLbl.style.color==errorFontColor)
		 carrierLbl.style.color=fontColor;
		
		if(resetForm || carrier.value==0 && !isEmpty(otherCarrier.value) && carrierLbl.style.color==errorFontColor)
		 carrierLbl.style.color=fontColor;
		
		if(resetForm || secQues.value!=-1 && secQuesLbl.style.color==errorFontColor)
		 secQuesLbl.style.color=fontColor;
		
		if(resetForm || secQues.value==0 && !isEmpty(otherSecQues.value) && secQuesLbl.style.color==errorFontColor)
		 secQuesLbl.style.color=fontColor;
		
		if(resetForm || !isEmpty(ans.value) && ansLbl.style.color==errorFontColor)
		 ansLbl.style.color=fontColor;
		
		if(resetForm || tnc.checked && tncLbl.style.color==errorFontColor)
		 tncLbl.style.color=fontColor;
	}
	
	/* End of Registration form Validator */
	
	
	
	/* Users form Validator */
	
	function switchToCarrierText(){
		document.getElementById("carrierChoice").style.display="none";
		document.getElementById("carrierText").style.display="inline";
		//document.getElementById("OTHER_CARRIER").value="Enter New Carrier...";
		document.getElementById("OTHER_CARRIER").select();
	}
	
	function switchToCarrierChoice(){
		document.getElementById("carrierChoice").style.display="inline";
		document.getElementById("carrierText").style.display="none";
		//alert(document.getElementById("CARRIER").options[0].selected);
		//document.getElementById("CARRIER").options[0].selected=true;
	}
	
	function switchToSecQuesText(){
		document.getElementById("secQuesChoice").style.display="none";
		document.getElementById("secQuesText").style.display="inline";
		//document.getElementById("NEW_SEC_QUES").value="Enter New Question...";
		document.getElementById("NEW_SEC_QUES").select();
	}
	
	function switchToSecQuesChoice(){
		document.getElementById("secQuesChoice").style.display="inline";
		document.getElementById("secQuesText").style.display="none";
		//alert(document.getElementById("SECURITY_QUESTION").options[0].selected);//.selected="true";
		//document.getElementById("SECURITY_QUESTION").options[0].selected=true;
	}
	
	function checkUsersForm(){
		var username=document.getElementById('USERNAME');
		alert(username.value=="");
		return false;
	}
	
	/* End of Users form Validator */
	
// -->