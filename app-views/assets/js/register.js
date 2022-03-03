const registerForm = Q("#regiter-user");


registerForm.addEventListener('submit', function(event) {
	event.preventDefault();

	const data = new FormData(this);

	const path = _webroot + "app-analysers/registerUser.php";

	postRequest(data, path, (res) => {

		if(res !== null) {

			if(res.error == 0)
			{
				Swa({
					swaTitle: "Inscription réussie !", 
					swaType: "success", 
					swaMsg: res.message,
					swabtnTitle: "Fermer",
					sec: 4000
				}, function() {});
				setTimeout(function() {
					redirect("");
				},4000)

			}else {
				Swa({
					swaTitle: "Oups, une petite erreur !", 
					swaType: "error", 
					swaMsg: res.message,
					swabtnTitle: "Fermer",
					sec: 4000
				}, function() {});
			}

		}else {
			Swa({
				swaTitle: "Erreur fatale !", 
				swaType: "error", 
				swaMsg: "Vous ne pouvez pas vous inscrire pour le moment",
				swabtnTitle: "Fermer",
				sec: 4000
			}, function() {});
		}

	}, (err) =>{}, Q("body"), () =>{});

	return false;
});