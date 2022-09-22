<template>
    <div class="row">
        <div
            class="col-12 d-none d-md-block mx-auto bg-white d-sm-none d-md-block py-3 mb-2"
        >
            <div class="row">
                <div class="col-2">
                    <v-select
                        placeholder="İl"
                        @change="getJobList"
                        :options="cities"
                        v-model="selectedCity"
                        :multiple="false"
                    ></v-select>
                </div>
                <div class="col-2">
                    <v-select
                        placeholder="İlçe"
                        @input="getJobList"
                        :options="districts"
                        v-model="selectedDistricts"
                        :multiple="false"
                    ></v-select>
                </div>
                <div class="col-3">
                    <v-select
                        placeholder="Uzmanlığı"
                        @input="getJobList"
                        :options="categories"
                        v-model="selectedCategory"
                        :multiple="false"
                    ></v-select>
                </div>
                <div class="col-2">
                    <v-select
                        placeholder="İlan tarihi"
                        @input="getJobList"
                        :options="orderTypes"
                        v-model="selectedOrderType"
                        :multiple="false"
                    ></v-select>
                </div>
            </div>
        </div>
        <div class="row mx-5">
            <div
                class="tw-flex tw-flex-col tw-space-y-4 tw-h-full tw-col-span-3"
            >
                <div
                    @click="selectedJob = job"
                    v-for="(job, index) in jobs"
                    class="d-none d-md-block tw-bg-white tw-h-auto tw-rounded-lg"
                    :class="{ 'active-job': job?.id === selectedJob?.id }"
                >
                    <div
                        class="lg:tw-pt-7 tw-pt-6 px-2 tw-flex tw-flex-row tw-space-x-6"
                    >
                       <JobSingle :job="job"/>
                    </div>
                </div>
                <div
                    @click="jobClicked(job)"
                    v-for="(job, index) in jobs"
                    class="d-block d-md-none tw-bg-white tw-h-30 tw-rounded-lg my-1"
                    :class="{ 'active-job': job?.id === selectedJob?.id }"
                >
                    <div
                        class="lg:tw-pt-7 tw-pt-6 tw-pl-6 tw-flex tw-flex-row tw-space-x-6"
                    >
                        <JobSingle :job="job"/>
                    </div>
                </div>
            </div>
            <div
                class="tw-bg-white tw-h-[calc(100%+2rem)]"
            >
                <div class="tw-py-4 px-4 tw-grid tw-grid-rows-2 tw-gap-y-8">
                    <div class="tw-flex tw-flex-col tw-row-span-2 w-full">
                        <div
                            class="tw-grid mb-3 tw-col-span-5 text-center mx-auto"
                        >
                            <img
                                v-for="media in selectedJob?.media"
                                :src="media"
                                class="tw-rounded-xl tw-w-200 tw-h-200 tw-col-span-1"
                            />
                        </div>
                        <div
                            class="tw-flex tw-col-span-5 text-left mx-auto tw-flex-col"
                        >
                            <h1 class="tw-font-bold tw-pr-4">
                                {{ selectedJob?.title }}
                            </h1>
                            <div>
                                <h1 class="tw-pt-3">
                                    {{ selectedJob?.district?.name }},
                                    {{ selectedJob?.city?.name }}
                                </h1>
                            </div>
                        </div>
                    </div>

                    <JobDetail/>
                </div>
            </div>
        </div>
        <el-drawer
            title="I'm inner Drawer"
            :direction="'ltr'"
            size="80%"
            :append-to-body="true"
            :visible.sync="drawer"
        >
            <JobDetail :job="job"/>
        </el-drawer>
    </div>
</template>

<script>
const apiUrl = process.env.MIX_API_URL;
const appUrl = process.env.APP_URL;
import JobSingle from "./JobSingle";
import JobDetail from "./JobDetail";

export default {
    props: ["currentLocation"],
    data() {
        return {
            jobs: [],
            selectedJob: null,
            selectedCity: null,
            selectedDistricts: null,
            selectedCategory: null,
            selectedSallary: null,
            selectedOrderType: null,

            cities: [],
            districts: [],
            workTypes: [],
            categories: [],
            salaries: [],
            orderTypes: [],

            drawer: false,
        };
    },
    mounted() {
        this.getGeneralData();
        this.getJobList();
    },
    components:{
        JobSingle,
        JobDetail,
    },
    methods: {
        getGeneralData() {
            axios.get(apiUrl + "homepageDatas").then((resp) => {
                this.cities = resp.data.cities.map((q) => {
                    return { label: q.name, value: q.id };
                });
                this.districts = resp.data.districts.map((q) => {
                    return { label: q.name, value: q.id };
                });
                this.workTypes = resp.data.work_types.map((q) => {
                    return { label: q.name, value: q.id };
                });
                this.categories = resp.data.categories.map((q) => {
                    return { label: q.name, value: q.id };
                });
                this.selectedCity = {
                    label: resp.data.selected_city.name,
                    value: resp.data.selected_city.id,
                };
            });
        },
        jobClicked(job) {
            this.selectedJob = job;
            this.drawer = true;
        },
        getJobList(page = 1) {
            axios
                .get(apiUrl + `job-v1`, {
                    params: {
                        page: page,
                        city_id: this.selectedCity?.value,
                        district_id: this.selectedDistricts?.value,
                    },
                })
                .then((resp) => {
                    let data = resp.data.data;
                    this.jobs = data;
                    this.selectedJob = this.jobs[0];
                });
        },
        getContact(){
            alert('sds')
        }
    },
};
</script>

<style scoped>
.active-job {
    outline: none !important;
    border-color: #719ece;
    box-shadow: 0 0 10px #719ece;
    width: auto;
    height: auto;
}
</style>
