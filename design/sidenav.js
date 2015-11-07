var showForm=function(form){
	var formName=['form11','form22','form33','form44','form55'];
	var arrayForm = ['form1', 'form2', 'form3', 'form4', 'form5'];
	for (var i = 0; i < formName.length; i++) {
		var formVar=formName[i];
		if (formVar==form){
			document.getElementById(arrayForm[i]).style.display="block";
		}
		else{
			document.getElementById(arrayForm[i]).style.display="none";
		}
	}
	
}