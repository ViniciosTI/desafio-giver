import axios from 'axios'

export default class Clients {
    uploadCsvFile(data) {
        const url = "http://localhost:8000/clients/uploadFile";
        return axios.post(url, data)
    }

    getListPaginate(page) {
        const url = "http://localhost:8000/clients/findByPaginate/" + page;
        return axios.get(url)
    }

    getGraphItems() {
        const url = "http://localhost:8000/clients/findGraphItems";
        return axios.get(url)
    }
}

