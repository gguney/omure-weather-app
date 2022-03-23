import axios from 'axios'

export default axios.create({
    baseURL: process.env.MIX_API_URL + ':' + process.env.MIX_APP_PORT + '/api',
    timeout: 10000
})
