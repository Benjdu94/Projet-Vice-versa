var currentTab = 0, choix = null;
var tabs = document.getElementsByClassName("tab");

document.addEventListener("DOMContentLoaded", function (event) {
    showTab(currentTab);
});

function showTab(tabNumber) {
    tabs[tabNumber].style.display = "block";

    if (tabNumber === 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }

    if (tabNumber === 1) {
		if (choix === "entreprise") {
			document.getElementById("entreprise").style.display = "inline";
		} else {
			document.getElementById("particulier").style.display = "none";
		}
	}

    if (tabNumber === 1) {
		if (choix === "entreprise") {
			document.getElementById("siret").value = "";
			document.getElementById("siret").style.display = "block";
			document.getElementById("etp").value = "";
			document.getElementById("etp").style.display = "block";
			$('.info-entreprise').css('display','block');
			$('.info-particulier').css('display','none');
			
		} else {
			document.getElementById("siret").value = "-"; //pour éviter que la validation bloque ici car vide
			document.getElementById("siret").style.display = "none";
			document.getElementById("etp").value = "-"; //pour éviter que la validation bloque ici car vide
			document.getElementById("etp").style.display = "none";
			$('.info-particulier').css('display','block');
			$('.info-entreprise').css('display','none');

		}
	}


    if (tabNumber === (tabs.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Envoyer";
    } else {
        document.getElementById("nextBtn").innerHTML = "Suivant";
    }

    fixStepIndicator(tabNumber)
}

function nextPrev(toAdd) {

	if (toAdd === 1 && !validateForm()) {
    	return false;
	}

    if (toAdd === -1) {
		var invalids = document.getElementsByClassName("is-invalid");
		var invalidFeedbacks = tabs[currentTab].getElementsByClassName("invalid-feedback");

		// On réinitialise les précédentes validations en cas de retour arrière.
		// Pour ne pas les retrouver dans les pages suivantes.
		while (invalids.length > 0){
			// Une boucle pour empêcher de passer à la page précédente.
			// Avant que tous les is-invalids soient retirés.
			for (var i = 0; i < invalids.length; i++) {
				invalids[i].classList.remove("is-invalid");
			}
		}
	}
    
    tabs[currentTab].style.display = "none";
    currentTab = currentTab + toAdd;
    if (currentTab >= tabs.length) {

        console.log('here')
        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("devis").style.display = "none";
        document.getElementById("text-message").style.display = "block";

    } else {
		showTab(currentTab);
	}
}

function validateForm() {
    var valid = true;

	// Au premier step, on bloque la suite si l'utilisateur n'a pas fait de choix
    if (currentTab === 0) {
		if (!isRadioChecked()) {  
    		return false;
		}
	}
    

    // 2eme step: des coordonnées, mail
    if (currentTab === 1) {
                if (!noInputEmpty()) {
                    valid = false;
                }
                if (!checkEmail()) {
                    valid = false;
                }
                if (valid === false) {
                    return false;
                }

    }

    // 3eme step: Besoins fichiers etc...
    if (currentTab === 2) {
        if (!isFileChecked()) {
            return false;
        }
		if (!UrlWetransfer()) {
            return false;
        }
    }

    // 4eme step: Checkbox optionnel
    if (currentTab === 3) {
        if (!isCheckboxChecked()) {
            return false;
        }
    }
    
    // 5eme step: Date
    if (currentTab === 4) {
        if (!isDateChecked()) {   
            return false;
        }
    }
 
    // Est-ce utile ?
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}


// DES FONCTIONS

function fixStepIndicator(tabNumber) {
    var steps = document.getElementsByClassName("step");
    for (var i = 0; i < steps.length; i++) {
        steps[i].className = steps[i].className.replace(" active", "");
    }
    steps[tabNumber].className += " active";
}


// Fonction de radio de choix
function isRadioChecked() {
	var checked = false;
	var radios = document.getElementsByName("selection");
	var choixRadio = document.getElementById("choixRadios");

	for (var i = 0; i < radios.length; i++) {
		if (radios[i].checked) {
			choix = radios[i].value;
			checked = true;
		}
		if (!checked) {
			choixRadio.className += " is-invalid"
		} else {
			choixRadio.classList.remove("is-invalid");
		}
	} 			

	return checked;
}


// Fonction Email
function checkEmail(email) {
	var checked = true;
	var email = document.getElementById("email");
	var divEmail = email.closest("div");
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (!re.test(email.value)) {
    	divEmail.className += " is-invalid";
    	checked = false
	} else {
		divEmail.classList.remove("is-invalid");
	}

    return checked;
}


// Fonction Fichier Word
function isFileChecked(fileName) {
	var checked = true;
	var fileInput = document.getElementById("formFile");
	var fichier = document.getElementById("choisirFile");
	var filePath;
	var divFile = fichier.closest("#file_group");

	var allowedExtensions = /(\.doc|\.docx|\.rtf|\.txt)$/i;

	// il n'y a qu'un seul input de fichier à charger.
	filePath = fileInput.value;
	if (!allowedExtensions.exec(filePath)) {
		divFile.className += " is-invalid";
		fichier.textContent = 'Importez fichier de word';
		checked = false;
	} else {
		divFile.classList.remove("is-invalid");
		fichier.textContent = fileName;
	}

	return checked;
}


// Fonction Email
function UrlWetransfer() {
	var checked = true;
	var url = document.getElementById("url");
	var re = /^(?:https:\/\/we\.tl\/)[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/;

	if (url.value !="" && !re.test(url.value)) {
    	url.className += " is-invalid";
    	checked = false
	} else {
		url.classList.remove("is-invalid");
	}

    return checked;
}


// Fonction checkbox
function isCheckboxChecked() {
	var textChecked = false;
	var videoChecked = false;
	var fileChecked = false;
	var textcheckboxs = document.getElementById("text-checkbox");
	var videocheckboxs = document.getElementById("video-checkbox");
	var filecheckboxs = document.getElementById("file-checkbox");
    var allTextcheckboxsInputs = textcheckboxs.getElementsByTagName("input");
    var allVideocheckboxsInputs = videocheckboxs.getElementsByTagName("input");
    var allfilecheckboxsInputs = filecheckboxs.getElementsByTagName("input");

    // Au moins, un seul checkbox coché dans la partie texte
    for (var i = 0; i < allTextcheckboxsInputs.length; i++){
    	if (allTextcheckboxsInputs[i].checked) {
    		textChecked = true;
		}
    }
	if (!textChecked) {
		textcheckboxs.className += " is-invalid"
	} else {
		textcheckboxs.classList.remove("is-invalid");
	}

	// Au moins, un seul checkbox coché dans la partie video
	for (var j = 0; j < allVideocheckboxsInputs.length; j++){
		if (allVideocheckboxsInputs[j].checked) {
			videoChecked = true;
		}
	}
	if(!videoChecked) {
		videocheckboxs.className += " is-invalid"
	} else {
		videocheckboxs.classList.remove("is-invalid");
	}

	// Au moins, un seul checkbox coché dans la partie format
	for (var k = 0; k < allfilecheckboxsInputs.length; k++){
		if (allfilecheckboxsInputs[k].checked) {
			fileChecked = true;
		}
	}
	if(!fileChecked) {
		filecheckboxs.className += " is-invalid"
	} else {
		filecheckboxs.classList.remove("is-invalid");
	}

	return (fileChecked && videoChecked && fileChecked);
}


// Fonction date
function isDateChecked() {
	var checked = true;
	var date = document.getElementById('date');
	if (!isNaN(date.value)) {
		date.className += " is-invalid";
		checked = false;
	} else {
		document.getElementById('formulaire').submit();
	}

	return checked;
}

function noInputEmpty() {
	var checked = true;
	var inputs = tabs[currentTab].getElementsByTagName("input");

	// Si un champs est vide, on bloque la suite
	for (var i = 0; i < inputs.length; i++) {
		if (inputs[i].value === "" && inputs[i].required) {
			inputs[i].className += " is-invalid";
			checked = false;
		} else {
			inputs[i].classList.remove("is-invalid");
		}
	}

	return checked;
}






