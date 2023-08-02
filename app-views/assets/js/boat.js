// ajout d'une reservation
const addReservationForm = Q("#add-destination");

addReservationForm.addEventListener('submit', function(event) {
	event.preventDefault();

	let dataRes = new FormData(this);

	let path   = _webroot + "app-analysers/addDestination.php";


	postRequest(dataRes, path, (response) => {


		if(response !== null)
		{
			if(response.error == 0)
			{
				Swa({
					swaTitle: "Success", 
					swaType: "success", 
					swaMsg: response.message,
					swabtnTitle: "Fermer",
					sec: 4000
				}, function() {})

				setTimeout(function() {
					Q("#latedismiss").setAttribute('data-bs-dismiss', 'modal');
					redirect('boat/');
				},4000)
			}
			else
			{
				Swa({
					swaTitle: "Oups, une petite erreur !", 
					swaType: "warning", 
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
				swaMsg: "Une erreur est survenue !",
				swabtnTitle: "Fermer",
				sec: 4000
			}, function() {})
		}


	}, (error) => {}, Q("body"), () =>{})

	return false;
});

// Pagination 
let dataTable = new simpleDatatables.DataTable(Q('#table1'));