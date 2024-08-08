import axios from 'axios';

// const apiUrl = import.meta.env.VUE_APP_API_BASE_URL;
const apiUrl = 'http://localhost:8000/api/';

const instance = axios.create({
  baseURL: apiUrl,
});

export default instance;