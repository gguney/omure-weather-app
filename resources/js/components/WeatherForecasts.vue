<template>
    <div class="shadow-lg min-w-full">
        <div class="px-6 py-4 border-b">
            <span class="font-bold text-2xl mr-2">Weather Forecasts</span>
        </div>
        <div class="px-6 py-4">
            <div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Date</label>
                <input
                    class="block w-50 text-gray-700 border rounded py-1 px-2 mb-3 focus:outline-none focus:bg-white"
                    id="grid-first-name"
                    type="date"
                    placeholder="Enter a date to make a search"
                    v-model="date"
                >
            </div>
            <button class="text-white font-bold py-1 px-3 rounded bg-blue-500 hover:bg-blue-700"
                    @click="fetchWeatherForecasts">
                Fetch Weather Forecasts
            </button>
            <div v-if="error" class="text-red-700 py-4">
                {{ error }}
            </div>
            <div v-loading="loading">
                <div class="py-2 grid grid-cols-3" v-for="weatherForecast in weatherForecasts"
                     :key="weatherForecast.id">
                    <div class="font-bold">{{ weatherForecast.location.city.name }}</div>
                    <div>{{ weatherForecast.forecast_date }}</div>
                    <div>{{ weatherForecast.meta }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { index } from '../../api/weatherForecasts'

export default {
    data() {
        return {
            weatherForecasts: null,
            date: null,
            error: null,
            loading: false
        }
    },
    methods: {
        async fetchWeatherForecasts() {
            this.loading = true
            this.weatherForecasts = null
            this.error = null

            index({ date: this.date })
                .then(response => {
                    this.weatherForecasts = response.data.weatherForecasts
                })
                .catch(error => {
                    this.error = error.response.data.message
                })
                .finally(() => {
                    this.loading = false
                })
        }
    }
}
</script>
