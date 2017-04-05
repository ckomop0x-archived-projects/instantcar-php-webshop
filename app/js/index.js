import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import CarsList from './components/CarsList/CarsList';
import Filter from './components/Filter/Filter'

class App extends Component {
	render() {
		return (
			<div className="application">
				<Filter />
				<CarsList />
			</div>
		)
	}
}

console.log('ok');
if(document.getElementById('searchapp')) {
	ReactDOM.render(
		<App />, document.getElementById('searchapp')
	);
}


$('.owl-carousel').owlCarousel({
	loop:true,
	margin:10,
	nav:true,
	lazyLoad: true,
	responsive: {
		0:  {
			items:1
		},
		600:  {
			items:1
		},
		1000: {
			items:1
		}
	}
})

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
			this.setState({cars: response.data.message.data.cars});
			console.log(response.data.message.data.cars);
		}).catch(function(error) {
			console.log(error);
		});
	}
}



