import axios from 'axios';

export const api = (data)=>{
	// console.log('Knock-knock to APi', data)
	return axios({
		method: 'POST',
		url: '/api.php',
		data: data,
		headers: {'Content-Type': 'application/json'}
	}).then((response) => {
		// console.log(response.data.message.data)
		return response.data.message.data;
	}).catch(function(error) {
		// console.log(error);
		return false;
	});
}

