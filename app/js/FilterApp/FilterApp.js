import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import CarsList from './components/CarsList/CarsList';
import Filter from './components/Filter/Filter'

// import helpers
import {
	api
} from '../helpers/api'

class App extends Component {
	constructor(props) {
		super(props);
		this.state = {
			cars: [],
			carMakers: [],
			selectedCarmaker: '',
			carModels: 'Select carmaker First'
		};
	}


	changeCarmaker(event) {
		const data = {
			request: 'carMake',
			carmake: event.target.innerText
		};
		const apiData = api(data);

		apiData.then(result => {
			console.log(result);
			this.setState({carModels: result});
			this.setState({cars: result});
			this.setState({selectedCarmaker: data.carmake});
			console.log(result);
			if (result === false) {
				this.setState({carModels: 'No models found'})
			}
		})
	}
	changeCarmodel(event) {
		const data = {
			request: 'carModel',
			carmake: this.state.selectedCarmaker,
			carmodel: event.target.innerText
		};
		const apiData = api(data);

		apiData.then(result => {
			this.setState({cars: result});
			if (result === false) {
				this.setState({carModels: 'No models found'})
			}
		})
	}
	resetFilter() {
		const requestAuto = {request: "auto"};
		const autoData = api(requestAuto);
		autoData.then(result => {
			this.setState({cars: result.cars});
		});
		this.setState({
			selectedCarmaker: '',
			carModels: 'Select carmaker First'
		})
	}

	componentDidMount() {
		const requestCarmakers = {request: "carmakers"};
		const requestAuto = {request: "auto"};
		const carmakersData = api(requestCarmakers);
		const autoData = api(requestAuto);

		carmakersData.then(result => {
			this.setState({carMakers: result});
		});
		autoData.then(result => {
			this.setState({cars: result.cars});
		});


	}
	render() {
		return (
				<div className="application row">
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

if(document.getElementById('searchapp')) {
	ReactDOM.render(
		<App />, document.getElementById('searchapp')
	);
}
