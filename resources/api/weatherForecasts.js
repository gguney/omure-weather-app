import axiosInstance from "./axiosInstance";

export function index(data) {
    return axiosInstance({
        method: 'POST',
        url: '/weather-forecasts',
        data
    })
}
