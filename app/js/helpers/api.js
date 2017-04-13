import axios from 'axios';

/**
 *
 * @param data
 * @returns {Promise.<T>|*}
 */
const api = (data)=>{
	return axios({
		method: 'POST', // api method
		url: '/api.php',  // api URL
		data: data,
		headers: {'Content-Type': 'application/json'}
	}).then((response) => {
		// console.log(response.data.message.data)
		return response.data.message.data;
	}).catch(function() {
		return false;
	});
}

export default api
