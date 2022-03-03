const loginForm = Q("#login-form");

loginForm.addEventListener('submit', function(event) {
	event.preventDefault();

	let data = new FormData(this);

	let path = _webroot + "app-analysers/connectUser.php";


	postRequest(data, path, (response) => {

		if(response !== null)
		{	
			if(response.error == 0)
			{
				Swa({
					swaTitle: "Connexion réussie !", 
					swaType: "success", 
					swaMsg: response.message,
					swabtnTitle: "Fermer",
					sec: 2000
				}, function() {});
				setTimeout(function() {

					if(Q("#savesession").checked)
					{
						localStorage.setItem('k_user_pîd', response.pid);
					}

					redirect("");
				},2000)
			}
			else 
			{
				Swa({
					swaTitle: "Oups, une petite erreur !", 
					swaType: "error", 
					swaMsg: response.message,
					swabtnTitle: "Fermer",
					sec: 4000
				}, function() {})
			}


		}
		else
		{
			Swa({
				swaTitle: "Erreur interne !", 
				swaType: "error", 
				swaMsg: "Impossible d'effectuer l'opérationpour le moment, mercie de réessayer !",
				swabtnTitle: "Fermer",
				sec: 2000
			}, function() {})
		}

	}, (error) => {}, Q("body"), () =>{});


	return false;
})