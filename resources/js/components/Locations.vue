<template>
    <div class="shadow-lg min-w-full mb-2">
        <div class="px-6 py-4 border-b">
            <span class="font-bold text-2xl mr-2">Locations</span>
        </div>
        <div class="px-6 pt-4 pb-2" v-if="locations">
            <div>
                <div class="py-2 grid grid-cols-3" v-for="location in locations" :key="location.id">
                    <div class="font-bold">
                        <a class="link" :href="getGoogleMapsLink(location)" target="_blank">{{ location.city.name }}</a>
                    </div>
                    <div>{{ location.latitude }}</div>
                    <div>{{ location.longitude }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { index } from '../../api/locations'

export default {
    data() {
        return {
            locations: null
        }
    },
    mounted() {
        this.fetchLocations()
    },
    methods: {
        async fetchLocations() {
            this.locations = (await index()).data.locations
        },
        getGoogleMapsLink(location) {
            return "https://maps.google.com/?q=" + location.latitude + "," + location.longitude
        }
    }
}
</script>

<style scoped>
.link{
    color: #60a5fa;
}
</style>
