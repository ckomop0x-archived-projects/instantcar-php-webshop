import React, { Component } from 'react'
import axios from 'axios';

import CarsListItem from './CarsListItem'

class CarsList extends Component {
	constructor(props) {
		super(props);
		this.state = {
			cars: []
		};

		// this.handleChange = this.handleChange.bind(this);
		// this.handleSubmit = this.handleSubmit.bind(this);
	}
	componentDidMount() {
		console.log('Knock-knock to APi')
		axios({
			method: 'POST',
			url: '/api.php',
			data: {
				request: "auto"
			}, headers: {'Content-Type': 'application/json'}
		}).then((response) => {
			this.setState({cars: response.data.message.data.cars});
			console.log(response.data.message.data.cars);
		}).catch(function(error) {
			console.log(error);
		});
	}
	render() {
		const data = [];
		this.state.cars.map(car => {
			if (car.reserved !== true) {
				data.push(<CarsListItem key={car.id}
				                        imgSrc={car.images[1]}
				                        model={car.model}
				                        price={car.price}
				                        title={car.title}
				                        articul={car.articul}
				                        carmake={car.carmake}/>)
			}
			return data;
		})
		return(
			<div className="cars-list">
				<h3 className="filter-container-subtitle">Cars List</h3>
				{data}
			</div>
		)
	}
}

export default CarsList