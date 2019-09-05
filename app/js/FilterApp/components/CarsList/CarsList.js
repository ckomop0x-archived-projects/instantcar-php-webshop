import React, { Component } from 'react'

import CarsListItem from './CarsListItem'

class CarsList extends Component {
	render() {
		const data = [];
		this.props.cars.map(car => {
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
		});
		return (
			<div className='cars-lis col-12 col-sm-6 col-md-8 col-lg-9'>
				<h3 className='cars-list__title'>Cars List</h3>
				<div className='cars-list__elements'>
					{data}
				</div>
			</div>
		)
	}
}

export default CarsList

CarsList.propTypes = {
	cars: React.PropTypes.array
}
