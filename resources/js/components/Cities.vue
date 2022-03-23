<template>
    <div class="shadow-lg min-w-full mb-2">
        <div class="px-6 py-4 border-b">
            <span class="font-bold text-2xl mr-2">Cities</span>
        </div>
        <div class="px-6 pt-4 pb-2" v-if="cities">
            <div >
                <div class="py-2" v-for="city in cities" :key="city.id">
                    {{ city.name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { index } from '../../api/cities'

export default {
    data(){
      return {
          cities: null
      }
    },
    mounted() {
        this.fetchCities()
    },
    methods:{
        async fetchCities(){
            this.cities = (await index()).data.cities
        }
    }
}
</script>
