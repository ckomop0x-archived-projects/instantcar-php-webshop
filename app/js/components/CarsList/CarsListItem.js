import React from 'react'

const CarsListItem = (props) => {
	const {
		articul,
		carmake,
		imgSrc,
		model,
		price,
		title
	} = props;
	return (
		<div className="cars-list-item">
			<div className="cars-list-item__image">
				<img src={imgSrc}
				     alt={title}/>
			</div>
			<div className="cars-list-item__description">
				<div className="cars-list-item__description-text">Make: <b>{carmake}</b></div>
				<div className="cars-list-item__description-text">Model: <b>{model}</b> €</div>
				<div className="cars-list-item__description-text">Price: <b>{price}</b> €</div>
				<a href={`/auto/${articul}`}
				   title={`${carmake} - ${model}`}
				   className="cars-list-item__description-link">Detail page</a>
			</div>

		</div>
	)
}

export default CarsListItem



