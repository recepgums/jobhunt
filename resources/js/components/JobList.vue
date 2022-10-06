<template>
    <div class="col-xs-12 col-md-10  mx-auto" style="max-width: 1200px">
        <div class="row">
            <div class="col-12 d-none d-md-block mx-auto bg-white py-3 mb-3">
                <h1 class="font-weight-bold px-5 fs-22">
                    {{selectedCity?.label}}'deki {{selectedCategory?.label}} iş ilanları</h1>
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
            <div class="col-12 d-block d-md-none mx-auto bg-white py-3 mb-3">
                <!--Filter-->
                <div class="row">
                    <div class="col-6">
                        <v-select
                            placeholder="Pozisyon"
                            @change="getJobList"
                            :options="categories"
                            v-model="selectedCategory"
                            :multiple="false"
                        ></v-select>
                    </div>
                   <div class="col-6">
                       <el-button @click="filterDrawer=true" type="primary" plain>
                           Filtrele
                       </el-button>
                   </div>
                </div>
            </div>
            <div class="col-12 px-0">
                <div class="row mx-auto">
                    <!--Desktop Job List Item col-6-->
                    <div class="col-sm d-none d-md-block px-0 job-list-container" >
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
                    <div class="col-12 d-block d-md-none px-0 job-list-container">
                        <div
                            @click="jobClicked(job)"
                            v-for="(job, index) in jobs"
                            class="bg-white rounded-lg my-1"
                            :class="{ 'active-job': job?.id === selectedJob?.id }"
                        >
                            <JobSingle :job="job"/>
                        </div>
                    </div>
                    <!--JobDetail-->
                    <div class="col-sm d-none d-md-block">
                        <JobDetail :job="selectedJob" :isloggedin="isloggedin"/>
                    </div>
                </div>
            </div>


            <el-drawer
                :title="selectedJob?.title"
                :direction="'ltr'"
                size="80%"
                :append-to-body="true"
                :visible.sync="drawer"
            >
                <JobDetail class="job-drawer-container" :job="selectedJob" :isloggedin="isLoggedIn"/>
                <div class="tw-flex tw-flex-col w-full">
                    <button class="tw-bg-red-500 btn w-full text-white p-2 mx-auto"
                            style="font-weight: 600; width:95%;position: absolute;bottom: 20px">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        Ara
                    </button>
                </div>
            </el-drawer>

            <el-drawer
                title="Filtrele"
                :direction="'rtl'"
                size="80%"
                :append-to-body="true"
                :visible.sync="filterDrawer"
            >
                <div style="height: 20rem" class="container-fluid p-0">
                    <div class="col my-5">
                        <el-select v-model="selectedCity" placeholder="İl"
                                   @change="getJobList"
                        >
                            <el-option
                                v-for="item in cities"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                    <div class="col my-5">
                        <el-select v-model="selectedDistricts" placeholder="İlçe"
                                   @change="getJobList"
                        >
                            <el-option
                                v-for="item in districts"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                    <div class="col my-5">
                        <el-select v-model="selectedCategory" placeholder="Uzmanlığı"
                                   @change="getJobList"
                        >
                            <el-option
                                v-for="item in categories"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </div>
                    <div class="col my-5">
                        <el-select v-model="selectedWorkType" placeholder="Calisma Sekli"
                                   @change="getJobList"
                        >
                            <el-option
                                v-for="item in workTypes"
                                :key="item.value"
                                :label="item.label"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </div>

                    <div class="col-12 ">
                        <button @click="filterDrawer=false" class="tw-bg-red-500 btn w-full text-white p-2"
                                style="font-weight: 600;width:100%">
                            Sonuçları Göster
                        </button>
                    </div>
                </div>
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
    props:['isloggedin'],
    data() {
        return {
            jobs: [],
            selectedJob: null,
            selectedCity: null,
            selectedDistricts: null,
            selectedCategory: null,
            selectedSallary: null,
            selectedOrderType: null,
            selectedWorkType: null,

            cities: [],
            districts: [],
            workTypes: [],
            categories: [],
            salaries: [],
            orderTypes: [],

            drawer: false,
            filterDrawer: false,
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
.job-list-container{
    height: 56rem;
    padding-left: 2px; padding-right: 2px; margin-left: 2px; margin-right: 2px;
    overflow-y: scroll;
    /*overflow-x: hidden;*/
}
.job-drawer-container{
   height: 90vh;
    overflow: scroll;
}
/* ===== Scrollbar CSS ===== */
/* Firefox */
* {
    scrollbar-width: auto;
    scrollbar-color: #7d767f #ffffff;
}

/* Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 10px;
}

*::-webkit-scrollbar-track {
    background: #ffffff;
}

*::-webkit-scrollbar-thumb {
    background-color: #7d767f;
    border-radius: 10px;
    border: 3px solid #ffffff;
}
</style>
