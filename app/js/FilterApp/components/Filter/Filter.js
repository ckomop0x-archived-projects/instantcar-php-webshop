import React, { Component } from 'react'
import PropTypes from 'prop-types'

class Filter extends Component {

	render() {
		const carMakers = [];
		let carModels = [];

		this.props.carMakers.map(carmaker => {
			carMakers.push(
				<button key={carmaker}
				        className='btn btn-secondary'
				        onClick={event => { this.props.changeCarmaker(event)}}>{carmaker}</button>
			)
			return carMakers;
		});

		if (typeof(this.props.carModels) === 'object') {
			this.props.carModels.map(carmodels => {
				carModels.push(
					<button key={carmodels.model}
					        className='btn btn-secondary'
					        onClick={event => { this.props.changeCarmodel(event)}}>{carmodels.model}</button>)
				return carMakers;
			});
		} else {
			carModels = this.props.carModels;
		}


		return (
			<div className='filter-container col-12 col-sm-6 col-md-4 col-lg-3'>
				<h2 className='filter-container-title col-12'>Select your car</h2>
				<div>
					<div className='' style={{marginBottom: 20, marginTop: 20}}>
						<h3 className='col-8'
						    style={{display: 'inline-block', lineHeight: '40px'}}>Make</h3>
						<button className='col-4 btn btn-secondary'
						        onClick={this.props.resetFiler}
						        style={{verticalAlign: 'top'}}>Reset</button>
					</div>

					<div className='col-12'>
						{carMakers}
					</div>
				</div>
				<div>
					<h3 className='col-12'>Model</h3>
					<div className='col-12'>
						{carModels}
					</div>
				</div>
			</div>
		)
	}
}

export default Filter

Filter.propTypes = {
	carMakers: PropTypes.array,
	carModels: PropTypes.string,
	changeCarmaker: PropTypes.func,
	changeCarmodel: PropTypes.func,
	resetFiler: PropTypes.func
}
