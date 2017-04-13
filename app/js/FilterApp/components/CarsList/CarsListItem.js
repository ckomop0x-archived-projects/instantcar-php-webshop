import React from 'react'
import PropTypes from 'prop-types'

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
	articul: PropTypes.string,
	carmake: PropTypes.string,
	imgSrc: PropTypes.string,
	model: PropTypes.string,
	price: PropTypes.number,
	title: PropTypes.string
}
