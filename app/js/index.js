import axios from 'axios';

import './FilterApp/FilterApp';

if(document.querySelector('.detail-page-item__order')) {
	const reserveButton = document.querySelector('.detail-page-item__order');
	reserveButton.onclick = (event) => {
		console.log(event, event.target.dataset.articul);
		axios({
			method: 'POST',
			url: '/api.php',
			data: {
				request: 'reserve',
				articul: event.target.dataset.articul
			}, headers: {'Content-Type': 'application/json'}
		}).then((response) => {
			if(response.data.message.data === 'Already reserved') {
				$('#errorModal').modal();
				console.log(response)
			} else {
				$('#myModal').modal();
				console.log(response)
			}
			// this.setState({cars: response.data.message.data.cars});
			//
			// console.log(response.data.message.data.cars);
		}).catch(function(error) {
			console.log(error);
		});
	}
}



