import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import CarsList from './components/CarsList/CarsList';
import Filter from './components/Filter/Filter'

// import helpers
import api from '../helpers/api'

class App extends Component {

	/**
	 * Set default application state
	 * @param props
	 */
	constructor(props) {
		super(props);
		this.state = {
			cars: [], // All cars
			carMakers: [], // All car brands
			selectedCarmaker: '', // Selected car brand
			carModels: 'Select carmaker First' // Available models for selected car brand
		};
	}

	/**
	 * Before first mount of on application we are receiving data
	 * to fulfill application
	 */
	componentDidMount() {
		/**
		 * Receive brands and put it into current state
		 */
		const carmakersData = api({request: 'carmakers'});
		carmakersData.then(result => {
			this.setState({carMakers: result});
		});

		/**
		 * Receive cars and put it into current state
		 */
		const autoData = api({request: 'auto'});
		autoData.then(result => {
			this.setState({cars: result.cars});
		});
	}

	/**
	 * Function for changing filter data depends on received brand
	 * @param event
	 */

	changeCarmaker(event) {
		/**
		 * Request object with name of request and selected car brand
		 * @type {{request: string, carmake: string}}
		 */
		const data = {
			request: 'carMake', // type of request
			carmake: event.target.innerText // received brand
		};

		// Request to backend api
		const apiData = api(data);

		/**
		 * Receive data and put it into current state
		 */
		apiData.then(result => {
			this.setState({carModels: result}); // car models filtered by selected brand
			this.setState({cars: result}); // cars in CarsList filtered by selected brand
			this.setState({selectedCarmaker: data.carmake}); // selected brand
			if (result === false) {
				this.setState({carModels: 'No models found'})
			}
		})
	}
	/**
	 * Function for changing filter data depends on received model for selected brand
	 * @param event
	 */

	changeCarmodel(event) {
		/**
		 * Request object with name of request and selected car brand and model
		 * @type {{request: string, carmake: string, carmodel: string}}
		 */
		const data = {
			request: 'carModel', // type of request
			carmake: this.state.selectedCarmaker, // selected brand
			carmodel: event.target.innerText // selected model
		};

		// Request to backend api
		const apiData = api(data);

		/**
		 * Receive data and put it into current state
		 */
		apiData.then(result => {
			this.setState({cars: result});  // cars in CarsList filtered by selected brand and model
			if (result === false) {
				this.setState({carModels: 'No models found'})
			}
		})
	}

	/**
	 * Function for resetting filter
	 */

	resetFilter() {
		/**
		 * Request object with name of request
		 * @type {{request: string}}
		 */
		const requestAuto = {request: 'auto'}; // type of request

		// Request to backend api
		const autoData = api(requestAuto);

		/**
		 * Receive data and put it into current state
		 */
		autoData.then(result => {
			this.setState({cars: result.cars});
		});
		this.setState({
			selectedCarmaker: '', // reset selected brand
			carModels: 'Select carmaker First' // reset models
		})
	}
	render() {
		return (
			<div className='application row'>
				<Filter carMakers = {this.state.carMakers}
				        changeCarmaker = {this.changeCarmaker.bind(this)}
				        changeCarmodel = {this.changeCarmodel.bind(this)}
				        resetFiler = {this.resetFilter.bind(this)}
				        carModels = {this.state.carModels}/>
				<CarsList cars = {this.state.cars}/>
			</div>
		)
	}
}

if (document.getElementById('searchapp')) {
	ReactDOM.render(
		<App />, document.getElementById('searchapp')
	);
}
