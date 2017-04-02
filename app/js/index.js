import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import List from './App';
import Filter from './components/Filter/Filter'

class App extends Component {
	render() {
		return (
			<div className="application">
				<Filter />
				<List />
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

