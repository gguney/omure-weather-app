import axiosInstance from "./axiosInstance";

export function index() {
    return axiosInstance({
        method: 'GET',
        url: '/locations'
    })
}
