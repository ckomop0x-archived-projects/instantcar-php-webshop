import axios from 'axios';

// Importing the React application for the car search page
import './FilterApp/FilterApp';

if (document.querySelector('.detail-page-item__order')) {
	const reserveButton = document.querySelector('.detail-page-item__order');
	/**
	 *  Car reservation
	 *  we getting the car Articul and send it to the backend
	 * @param event
	 */
	reserveButton.onclick = (event) => {
		axios({
			method: 'POST', // api method
			url: '/api.php', // api URL
			data: {
				request: 'reserve', // type of request
				articul: event.target.dataset.articul  // articul of the car
			}, headers: {'Content-Type': 'application/json'}
		}).then((response) => {
			if (response.data.message.data === 'Already reserved') { // if the car is already reserved
				$('#errorModal').modal();
			} else { // if the car is just reserved
				$('#successModal').modal();
			}
		}).catch(function() {
			// if error do something
		});
	}
}
