<template>
    <div>
        <div class="grid grid-cols-2 space-x-4 mb-4">
            <Cities></Cities>
            <Locations></Locations>
        </div>
        <WeatherForecasts></WeatherForecasts>
    </div>
</template>

<script>
import Cities from './Cities'
import Locations from './Locations'
import WeatherForecasts from './WeatherForecasts'

export default {
    components: { Cities, Locations, WeatherForecasts },
    name: "App.vue"
}
</script>
