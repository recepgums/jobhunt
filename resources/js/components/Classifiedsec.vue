<template>
    <div class="row">
        <div class="col-12 mx-auto bg-white d-sm-none d-md-block py-3 mb-2">
            <div class="row">
                <div class="col-2">
                    <v-select  placeholder="İl" @change="getJobList" :options="cities" v-model="selectedCity" :multiple="false"></v-select>
                </div>
                <div class="col-2">
                    <v-select  placeholder="İlçe"  @input="getJobList" :options="districts" v-model="selectedDistricts" :multiple="false"></v-select>
                </div>
                <div class="col-3">
                    <v-select   placeholder="Uzmanlığı" @input="getJobList" :options="categories" v-model="selectedCategory" :multiple="false"></v-select>
                </div>
                <div class="col-2">
                    <v-select   placeholder="İlan tarihi" @input="getJobList" :options="orderTypes" v-model="selectedOrderType" :multiple="false"></v-select>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="tw-grid lg:tw-grid-cols-5 tw-gap-x-10 tw-grid-cols-1">
                <div class="tw-grid tw-grid-rows-8 tw-w-full tw-col-span-3">
                    <div @click="selectedJob = job" v-for="(job,index) in jobs" class="tw-bg-white tw-h-30 tw-rounded-lg my-1" :class="{'active-job' : job?.id === selectedJob?.id}">
                        <div
                            class="tw-grid lg:tw-grid-cols-6 tw-mt-7 tw-ml-4 tw-grid-cols-3 md:tw-grid-cols-5 tw-w-full"
                        >
                            <img
                                src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0"
                                class="tw-rounded-xl tw-col-span-1 tw-h-20 tw-w-20"
                            />
                            <div
                                class="tw-col-span-2 lg:tw-col-span-5 md:tw-col-span-4"
                            >
                                <div class="tw-grid tw-grid-cols-8 tw-w-full">
                                    <div class="md:tw-col-span-7 tw-col-span-6">
                                        <h1 class="tw-font-bold">
                                            Reklam Pazarlama Uzmanı
                                        </h1>
                                        <h1 class="tw-font-semibold">Adonis Network</h1>
                                    </div>
                                    <i class="fa-regular fa-bookmark tw-col-span-1"></i>
                                </div>
                                <!--                            <i class="fa-regular fa-bookmark tw-mt-3"></i>-->

                                <div>
                                    <h1>Esenyurt, Istanbul</h1>
                                    <h1>14 gün</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tw-col-span-2 tw-bg-white tw-h-[calc(100%+2rem)] tw-hidden lg:tw-block tw-rounded-lg">
                    <div class="tw-mt-7 tw-ml-7 tw-grid tw-grid-rows-2 tw-gap-y-8">
                        <div class="tw-grid tw-grid-cols-6 tw-row-span-2">
                            <div class="tw-grid tw-grid-rows-3 tw-col-span-4">
                                <h1 class="tw-font-bold">{{ selectedJob?.title }}</h1>
                                <h1 class="tw-mt-3">{{selectedJob?.district?.name}}, {{selectedJob?.city?.name}}</h1>
                                <p class="tw-underline tw-underline-offset-2">
                                    Haritada Gör
                                </p>
                            </div>

                            <img
                                src="https://cdn.dribbble.com/userupload/3158902/file/original-7c71bfa677e61dea61bc2acd59158d32.jpg?resize=400x0"
                                class="tw-rounded-xl tw-w-20 tw-h-20 tw-col-span-1"
                            />
                        </div>

                        <div class="tw-grid tw-rows-5 tw-gap-y-8">
                            <div>
                                <h1 class="tw-font-bold">İş Tanımı</h1>
                                <h1 class="tw-mt-4">
                                    {{selectedJob?.description}}
                                </h1>
                            </div>

                            <div class="tw-grid tw-grid-cols-2">
                                <div class="tw-flex tw-flex-col">
                                    <h1 class="tw-font-bold">Çalışma Türü</h1>
                                    <h1 class="tw-mt-2">{{ selectedJob?.work_type?.name }}</h1>
                                </div>

                                <div class="tw-flex tw-flex-col">
                                    <h1 class="tw-font-bold">Başvuru Sayısı</h1>
                                    <h1 class="tw-mt-2">10</h1>
                                </div>
                            </div>
                            <div class="tw-grid tw-grid-cols-2">
                                <div class="tw-flex tw-flex-col">
                                    <h1 class="tw-font-bold">Maaş Bilgisi</h1>
                                    <h1 class="tw-mt-2">{{selectedJob?.fee ? selectedJob?.fee + 'TL' : 'Belirtilmemiş'}}</h1>
                                </div>
                                <div class="tw-flex tw-flex-col">
                                    <h1 class="tw-font-bold">Cinsiyet</h1>
                                    <h1 class="tw-mt-2">{{selectedJob?.gender?.name ?? 'Farketmez'}}</h1>
                                </div>
                            </div>
                            <h1 class="tw-text-red-500">İlani Şikayet Et</h1>

                            <div class="tw-flex tw-flex-col">
                                <h1 class="tw-font-bold">İşveren Hakkında</h1>
                                <h1 class="tw-mt-2">{{ selectedJob?.user?.name }}</h1>
                                <h1 class="tw-mt-2 tw-w-60">
                                    Iş ilanı verilecek sitemiz için reklam
                                    kampanyalarını yönetecek eleman arıyorum
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const apiUrl = process.env.MIX_API_URL;
const appUrl = process.env.APP_URL;
export default {
    props: ["currentLocation"],
    data() {
        return {
            jobs: [],
            selectedJob: null,
            selectedCity:null,
            selectedDistricts:null,
            selectedCategory:null,
            selectedSallary:null,
            selectedOrderType:null,

            cities: [],
            districts: [],
            workTypes: [],
            categories: [],
            salaries: [],
            orderTypes: [],
        }
    },
    mounted() {
        this.getGeneralData()
        this.getJobList();
    },
    methods: {
        getGeneralData(){
          axios.get(apiUrl + 'homepageDatas').then(resp=>{
              this.cities = resp.data.cities.map(q=>{return {label:q.name,value:q.id}})
              this.districts = resp.data.districts.map(q=>{return {label:q.name,value:q.id}})
              this.workTypes = resp.data.work_types.map(q=>{return {label:q.name,value:q.id}})
              this.categories = resp.data.categories.map(q=>{return {label:q.name,value:q.id}})
              this.selectedCity = {label:resp.data.selected_city.name,value:resp.data.selected_city.id}
          })
        },
        getJobList(page = 1) {
            axios.get(apiUrl + `job`,{
               params:{
                   page:page,
                   city_id:this.selectedCity?.value,
                   district_id:this.selectedDistricts?.value
               }
            }).then((resp) => {
                let data = resp.data.data;
                this.jobs = data;
                this.selectedJob = this.jobs[0]
            });
        },
    },
};
</script>

<style scoped>
.active-job{
    outline: none !important;
    border-color: #719ECE;
    box-shadow: 0 0 10px #719ECE;
}

</style>
