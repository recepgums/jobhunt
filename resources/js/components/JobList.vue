<template>
    <div class="col-10 mx-auto">
        <div class="row">
            <div class="col-12 d-none d-md-block mx-auto bg-white py-3 mb-3">
                <!--Filter-->
                <div class="row">
                    <div class="col-3">
                        <v-select
                            placeholder="İl"
                            @change="getJobList"
                            :options="cities"
                            v-model="selectedCity"
                            :multiple="false"
                        ></v-select>
                    </div>
                    <div class="col-3">
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
                    <div class="col-3">
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
            <div class="col-12">
                <div class="row mx-auto">
                    <!--Desktop Job List Item col-6-->
                    <div class="col-sm d-none d-md-block">
                        <div
                            @click="selectedJob = job"
                            v-for="(job, index) in jobs"
                            class="bg-white rounded-lg mt-2"
                            :class="{ 'active-job': job?.id === selectedJob?.id }"
                        >
                            <JobSingle :job="job"/>
                        </div>
                    </div>
                    <!--Mobile Job List Item col-6-->
                    <div class="col-12 d-block d-md-none">
                        <div
                            @click="jobClicked(job)"
                            v-for="(job, index) in jobs"
                            class="bg-white rounded-lg"
                            :class="{ 'active-job': job?.id === selectedJob?.id }"
                        >
                            <JobSingle :job="job"/>
                        </div>
                    </div>
                    <!--JobDetail-->
                    <div class="col-sm">
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
