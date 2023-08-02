// ajout d'une reservation
const addReservationForm = Q("#add-reservation");

if(addReservationForm != null) {
addReservationForm.addEventListener('submit', function(event) {
	event.preventDefault();

	let dataRes = new FormData(this);

	let path   = _webroot + "app-analysers/addReservation.php";


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
					redirect('');
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
}
// Pagination 
let dataTable = new simpleDatatables.DataTable(Q('#table1'));



const actionUser = All(".setdata");

actionUser.forEach((user) => {
	user.addEventListener('click', () => {

	
	const data = user.getAttribute('dataset');

	const fakeData = Q("#fakeData");

	const pid = Q("#userpid");

	pid.value = data;

	let _currentPID = "vide";

	const path = _webroot + 'app-analysers/getcurrentuser.php';
	const _data = new FormData(fakeData);

	Q('#modal-show-user').classList.add('active');

	Q("#btnclose").addEventListener('click', () => {
		Q('#modal-show-user').classList.remove('active');
	});

	postRequest(_data, path, (res) => {

		if(res!=null) {
			const _userinfo = res.data;
			Q('.username').innerHTML = _userinfo.nom;
			Q(".nombateau").innerHTML = _userinfo.nombateau;
			Q('.depart_ile').innerHTML = _userinfo.ile_depart;
			Q('.arrive_ile').innerHTML = _userinfo.ile_arrive;
			_currentPID = _userinfo.pid;

			Q("#_pid").value = _currentPID;
			
			console.log(_currentPID);

			// Mettre à jour le paiement

			const upData = Q('#update-payement');
			upData.addEventListener('submit', function(event) {
				event.preventDefault();

				const _path = _webroot + 'app-analysers/updatePayement.php';
				const _d    = new FormData(this);

				postRequest(_d, _path, (re) => {

					console.log(re);

				},(er) => {}, Q('body'), () =>{});

				return false;
			})

		}

	}, (err) => {},Q('body'), ()=>{})



	console.log(data)

})
})