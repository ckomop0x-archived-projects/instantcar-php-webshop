import React, { Component } from 'react'

class Filter extends Component {
	render(){
		return(
			<div className="filter-container">
				<h2 className="filter-container-title">Filter</h2>
				<div>
					<h3 className="filter-container-subtitle">Car make</h3>
					<select name="carmake" id="carmake" className="filter-container-select">
						<option value="" selected>Select car make</option>
						<option value="Opel">Opel</option>
						<option value="BMW">BMW</option>
						<option value="Audi">Audi</option>
					</select>
				</div>
				<div>
					<h3 className="filter-container-subtitle">Car model</h3>
					<select name="carmake" id="carmake" className="filter-container-select">
						<option value="" selected>Select car model</option>
					</select>
				</div>
			</div>
		)
	}
}

export default Filter