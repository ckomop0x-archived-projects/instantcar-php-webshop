import React from 'react'

const CarsListItem = (props) => {
	const {
		articul,
		carmake,
		imgSrc,
		model,
		price,
		title	} = props
	return (
		<div className='cars-list__item'>
			<a  href={`/auto/${articul}`}
			    title={`${carmake} - ${model}`}
			    className='cars-list__item__link'>
				<div className='cars-list__item__image'>
					<img src={imgSrc} alt={title} />
				</div>
				<div className='cars-list__item__description'>
					<div className='cars-list__item__description-text' >Make: <b>{carmake}</b></div>
					<div className='cars-list__item__description-text' >Model: <b>{model}</b></div>
					<div className='cars-list__item__description-text' >Price: <b>{price}</b> €</div>
				</div>
			</a>
		</div>
	)
}

export default CarsListItem

CarsListItem.propTypes = {
	articul: React.PropTypes.string,
	carmake: React.PropTypes.string,
	imgSrc: React.PropTypes.string,
	model: React.PropTypes.string,
	price: React.PropTypes.number,
	title: React.PropTypes.string
}
