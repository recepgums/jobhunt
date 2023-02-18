<template>
    <el-skeleton :loading="filterloading" animated>
        <template slot="template">
            <!--Filtreleme-->
            <div class="col-xs-12 col-md-10  mx-auto" style="max-width: 1400px">
                <div class="row">
                    <div class="col-12 d-none d-md-block mx-auto bg-white py-3 mb-3">
                        <el-skeleton-item variant="h1" style="width: 135px;" />
                        <div class="row">
                            <div class="col-3">
                                <el-skeleton-item variant="h3" style="width: 80%; height: 40px;" />
                            </div>
                            <div class="col-3">
                                <el-skeleton-item variant="h3" style="width: 80%; height: 40px;" />
                            </div>
                            <div class="col-3">
                                <el-skeleton-item variant="h3" style="width: 80%; height: 40px;" />
                            </div>
                            <div class="col-3">
                                <el-skeleton-item variant="h3" style="width: 80%; height: 40px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--Mobile -->

            <div class="col-12 d-block d-md-none mx-auto bg-white py-3 mb-3">
                <el-skeleton-item variant="h1" />
                <div class="row">
                    <div class="col-6">
                        <el-skeleton-item variant="h3" style="width: 50%;" />
                    </div>
                    <div class="col-6">
                        <el-skeleton-item variant="h3" style="width: 50%;" />
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-10  mx-auto" style="max-width: 1200px">
                <div class="d-none d-md-block">
                    <div class="row">
                        <div class="col-6 bg-white">
                            <el-skeleton :loading="loading" animated :count="5">
                                <template slot="template">
                                    <div class="col-xs-12 col-md-10  mx-auto my-3 job-list-card" style="max-width: 1200px">
                                        <div class="row job-list-element" style="width: 100%" role="button">
                                            <div class="col-4 px-0">
                                                <el-skeleton-item variant="image"
                                                    style="width: 171px; height: 119.69px;" />
                                            </div>
                                            <div class="col-8 px-0">
                                                <span class="text-muted">
                                                    <el-skeleton-item variant="text" style="width: 30%;" />
                                                </span>
                                                <el-skeleton-item variant="h1" style="width: 270px; white-space: nowrap;
                                             overflow: hidden !important;
                                            text-overflow: ellipsis;
                                             height:2em;
                                               " />

                                                <div class="d-flex justify-content-between align-items-end">
                                                    <div style="color: #fb236a">
                                                        <small style="color:black;font-size:10px">
                                                            <el-skeleton-item variant="text" />
                                                        </small>
                                                    </div>
                                                    <div>
                                                        <small>
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </template>
                            </el-skeleton>
                        </div>
                        <div class="col-6">
                            <el-skeleton :loading="loading" animated>
                                <template slot="template">
                                    <div class="col-sm d-none d-md-block">
                                        <template>
                                            <div class="bg-white"
                                                style="border-radius:20px;overflow-x: hidden;height:100%">
                                                <div class="bant">
                                                    <div></div>
                                                </div>

                                                <div class="tw-flex tw-flex-col tw-row-span-2 w-full">
                                                    <div class="tw-grid tw-col-span-5 text-center mx-auto">
                                                        <el-skeleton-item variant="image"
                                                            style="width: 583px; height: 408px;" />
                                                    </div>
                                                    <div class="d-flex justify-content-around">
                                                        <div class="job-property">
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </div>
                                                        <div class="job-property">
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </div>
                                                        <div class="job-property">
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </div>
                                                        <div class="job-property">
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="p-3">
                                                    <div>
                                                        <h1 class="tw-pt-3" style="font-size: 12px;color:blue">
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </h1>
                                                        <h1
                                                            style=" font-size: 20px;font-weight: bolder; text-transform: capitalize;">
                                                            <el-skeleton-item variant="h1" style="width: 270px;" />
                                                        </h1>
                                                    </div>
                                                    <div>
                                                        <h2 class="mt-4">
                                                            <el-skeleton-item variant="text" style="width: 30%;" />
                                                        </h2>
                                                    </div>
                                                    <div class="mt-2" style="position:absolute;bottom:20px;width: 90%">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <el-skeleton-item variant="h1" style="width: 270px;" />
                                                            </div>
                                                            <div class="col-6">
                                                                <el-skeleton-item variant="h1" style="width: 270px;" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>

                                    </div>

                                </template>
                            </el-skeleton>
                        </div>
                    </div>
                </div>
                <div class="d-block d-md-none bg-white">
                    <div class="col-12">
                        <el-skeleton :loading="loading" animated :count="5">
                            <template slot="template">
                                <div class="col-xs-12 col-md-10 mx-auto  my-3" style="max-width: 1200px">
                                    <div class="row job-list-element" style="width: 100%" role="button">
                                        <div class="col-4 px-0 py-2">
                                            <el-skeleton-item variant="image" style="width: 30vw; height: 20vw;" />
                                        </div>
                                        <div class="col-8 px-0">
                                            <span class="text-muted">
                                                <el-skeleton-item variant="text" style="width: 30%;margin-left:30px" />
                                            </span>
                                            <el-skeleton-item variant="h1" style="width: 40vw; white-space: nowrap;
                                             overflow: hidden !important;
                                            text-overflow: ellipsis;
                                             height:2em;
                                             margin-left: 30px;
                                               " />

                                            <div class="d-flex justify-content-between align-items-end">
                                                <div style="color: #fb236a">
                                                    <small style="color:black;font-size:10px">
                                                        <el-skeleton-item variant="text" />
                                                    </small>
                                                </div>
                                                <div>
                                                    <small>
                                                        <el-skeleton-item variant="text" style="width: 30%;" />
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </template>
                        </el-skeleton>
                    </div>
                </div>
            </div>
        </template>

        <template>
                <div class="col-xs-12 col-md-10  mx-auto" style="max-width: 1300px">
                    <div class="row pt-3">
                        <div class="col-12 d-none d-md-block mx-auto py-3 mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <h1 class="font-weight-bold fs-22 my-3" v-if="!changeCityClicked">
                                        {{ cities.find(q => q.value === selectedCity)?.label }}
                                        {{ categories.find(q => q.value === selectedCategory)?.label }} iş ilanları
                                        <el-link type="primary" @click="changeCityClicked = true">değiştir</el-link>
                                    </h1>
                                    <el-select v-if="changeCityClicked" filterable v-model="selectedCity" placeholder="İl"
                                               @change="getJobList" clearable>
                                        <el-option v-for="item in cities" :key="item.value" :label="item?.label"
                                                   :value="item.value">
                                        </el-option>
                                    </el-select>
                                </div>
                                <div class="col-3">
                                    <el-select filterable v-model="selectedDistricts" placeholder="İlçe"
                                               @change="getJobList" clearable>
                                        <el-option v-for="item in districts" :key="item.value" :label="item?.label"
                                                   :value="item.value">
                                        </el-option>
                                    </el-select>
                                </div>
                                <div class="col-3">
                                    <el-select filterable v-model="selectedCategory" placeholder="Uzmanlığı"
                                               @change="getJobList" clearable>
                                        <el-option v-for="item in categories" :key="item.value" :label="item?.label"
                                                   :value="item.value">
                                        </el-option>
                                    </el-select>
                                </div>
                                <div class="col-3">
                                    <el-select filterable v-model="selectedWorkType" placeholder="Çalışma şekli"
                                               @change="getJobList" clearable>
                                        <el-option v-for="item in workTypes" :key="item.value" :label="item?.label"
                                                   :value="item.value">
                                        </el-option>
                                    </el-select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-md-none mx-auto mb-3 pop-up-fixed">
                            <div class="row px-4" style="font-size: 14px">
                                <h1 class="col-6 font-weight-bold fs-22 my-1 responsive-header text-left"
                                    style="background-color: transparent;padding:0">
                                    {{ cities.find(q => q.value === selectedCity).label }}
                                    {{ categories.find(q => q.value === selectedCategory)?.label }} iş ilanları
                                </h1>
                                <el-link class="col-6 d-block d-md-none text-right Filtrele" @click="filterDrawer = true"
                                         type="primary" style="font-size: 14px">
                                    Filtrele
                                </el-link>
                            </div>
                            <!--Filter-->
                            <div class="row">
                                <div class="col-10 horizontal-scroll" ref="horizontal">
                                    <el-tag class="item" style="margin-top: 10px;margin-right:5px;overflow: hidden;font-size: 14px"
                                            v-for="category in categories" :key="category.value"
                                            @click="selectedCategory = category.value" :type="category.type"
                                            :effect="selectedCategory === category.value ? 'dark' : 'light'">
                                        {{ category?.label }}
                                    </el-tag>
                                </div>
                                <div class=" mt-3" style="
                                        width: 30px;
                                        float: right;
                                        top: 20px;
                                        right: 10px;
                                        position: absolute;
                                        height: 30px;
                                        background-color: gray;
                                        border-radius: 50%;
                                        text-align: center;
                                        color: white;
                                        font-weight: bolder;
                                        padding: 2px;
                                    ">
                                    <i class="la la-arrow-right" @click="horizonright"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-0">
                            <div class="row mx-auto">
                                <!--Desktop Job List Item col-6-->
                                <div class="col-sm d-none d-md-block px-0 job-list-container pb-2"
                                     style="max-width: 100%;overflow-x: hidden;">
                                    <div  v-if="jobs?.length > 0" @click="selectedJob = job" v-for="(job, index) in jobs"
                                          class="bg-white rounded-lg mt-2"
                                          :class="{ 'active-job': job?.id === selectedJob?.id }">
                                        <JobSingle :theme="job.theme" :job="job" />
                                    </div>
                                    <span v-if="jobs?.length < 1">
                                        İlan bulunamadi, tüm ilanları görmek için
                                        <el-button type="primary" plain @click="clearFilter">Tıklayınız</el-button>
                                    </span>
                                    <div class="container mx-auto text-center pb-3">
                                        <div class="browse-all-cat ">
                                            <a href="/ilan" style="background-color: #fb236a;color: white" class="style2">Daha fazla iş ilanı
                                                görüntüleyin</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Mobile Job List Item col-6-->
                                <div class="col-12 d-block d-md-none px-0 job-list-container">
                                    <div  v-if="jobs?.length > 0" @click="jobClicked(job)" v-for="(job, index) in jobs"
                                          class="bg-white rounded-lg my-1 job-list-card"
                                          :class="{ 'active-job': job?.id === selectedJob?.id }">
                                        <JobSingle :job="job" :theme="job.theme" />
                                    </div>
                                    <span v-if="jobs?.length < 1">
                                        Ilan bulunamadi, tüm ilanları görmek için
                                        <el-button type="primary" plain @click="clearFilter">Tıklayınız</el-button>
                                    </span>
                                </div>
                                <!--JobDetail-->
                                <div class="col-sm d-none d-md-block">
                                    <JobDetail :job="selectedJob" :isloggedin="isloggedin" />
                                </div>
                            </div>
                        </div>


                        <el-drawer :title="selectedJob?.title" :direction="'btt'" size="80%" :append-to-body="true"
                                   :visible.sync="drawer">
                            <JobDetail @drawerToggle="drawer = false" style="overflow-y: hidden"
                                       class="job-drawer-container" :job="selectedJob" :isloggedin="isloggedin" />
                        </el-drawer>

                        <el-drawer title="Filtrele" :direction="'btt'" size="70%" :append-to-body="true"
                                   :visible.sync="filterDrawer">
                            <div class="container-fluid p-0" style="overflow-y: scroll;height: 60vh">
                                <div >
                                    <div class="col my-3">
                                        <p class="text-left">Şehir</p>
                                        <el-select v-model="selectedCity" placeholder="İl" @change="getJobList" clearable>
                                            <el-option v-for="item in cities" :key="item.value" :label="item?.label"
                                                       :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                    <div class="col my-3">
                                        <p class="text-left">İlçe</p>
                                        <el-select v-model="selectedDistricts" placeholder="İlçe" @change="getJobList"
                                                   clearable>
                                            <el-option v-for="item in districts" :key="item.value" :label="item?.label"
                                                       :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                    <div class="col my-3">
                                        <p class="text-left">Uzmanlığı</p>
                                        <el-select v-model="selectedCategory" placeholder="Uzmanlığı" @change="getJobList"
                                                   clearable>
                                            <el-option v-for="item in categories" :key="item.value" :label="item?.label"
                                                       :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                    <div class="col my-3">
                                        <p class="text-left">Çalışma Şekli</p>
                                        <el-checkbox-group v-model="selectedWorkType" class="d-flex justify-content-around"  @change="getJobList" >
                                            <el-checkbox-button  v-for="item in workTypes" :key="item.value" :label="item?.value">{{item?.label}}</el-checkbox-button>
                                        </el-checkbox-group>
                                    </div>
                                </div>


                                <div class="row mx-auto" style="position:absolute;bottom:1rem;text-align: center">
                                    <div class="col-6">
                                        <el-button style="font-size: 16px!important;padding:15px 20px" type="info" @click="clearFilter" ref="filter" plain>
                                            Filtreyi Temizle
                                        </el-button>
                                    </div>
                                    <div class="col-6">
                                        <el-button  style="font-size: 16px!important;padding:15px 20px" type="success" @click="filterDrawer = false">
                                            Sonuçları Göster
                                        </el-button>
                                    </div>
                                </div>
                            </div>
                        </el-drawer>
                    </div>
                </div>
            </template>

    </el-skeleton>
</template>

<script>
const apiUrl = process.env.MIX_API_URL;
const appUrl = process.env.APP_URL;
import JobSingle from "./JobSingle";
import JobDetail from "./JobDetail";

export default {
    props: ['isloggedin'],
    data() {
        return {
            loading: true,
            filterloading: true,
            changeCityClicked: false,
            jobs: null,
            selectedJob: null,
            selectedCity: null,
            selectedDistricts: null,
            selectedCategory: null,
            selectedSallary: null,
            selectedOrderType: null,
            selectedWorkType: [],

            cities: [],
            districts: [],
            workTypes: [],
            categories: [],
            salaries: [],

            drawer: false,
            filterDrawer: false,
        };
    },
    mounted() {
     setTimeout(()=>{
         this.clearFilter()
     },1750)

        this.getJobList();
        this.getGeneralData();
    },
    components: {
        JobSingle,
        JobDetail,
    },
    methods: {
        getGeneralData() {
            let homePageDataLocalStorage = JSON.parse(localStorage.getItem('homepageDatas'));
            if (homePageDataLocalStorage) {
                this.fillHomePageData(homePageDataLocalStorage)
            } else {
                axios.get(apiUrl + "homepageDatas").then((resp) => {
                    this.fillHomePageData(resp.data)
                    localStorage.setItem('homepageDatas', JSON.stringify(resp.data))
                });
            }
        },
        fillHomePageData(data) {
            this.cities = data.cities.map((q) => {
                return { label: q.name, value: q.id };
            });
            this.selectedCity = data.selected_city.id
            this.districts = data.selected_city.districts.map((q) => {
                return { label: q.name, value: q.id };
            });
            this.workTypes = data.work_types.map((q) => {
                return { label: q.name, value: q.id };
            });
            let categoryArray = data.categories.map((q) => {
                return { label: q.name, value: q.id};
            })

            categoryArray.push({label: 'Tümü', value: null})
            this.categories = [{label: 'Tümü', value: null},...categoryArray]


        },
        jobClicked(job) {
            this.selectedJob = job;
            this.drawer = true;
        },
        getJobList(page = 1) {
            this.loading = true;
            let jobListLocalStorage = JSON.parse(localStorage.getItem('jobs'));
            if (jobListLocalStorage) {
                this.fillJobList(jobListLocalStorage)
            }
            axios.get(apiUrl + `job-v1`, {
                params: {
                    page: 1,
                    city_id: this.selectedCity,
                    district_id: this.selectedDistricts,
                    category_id: this.selectedCategory,
                    work_type_id: this.selectedWorkType
                },
            }).then((resp) => {
                this.fillJobList(resp.data)

                localStorage.setItem('jobs', JSON.stringify(resp.data));
                this.filterloading = false;
                this.loading = false;
            });
        },
        fillJobList(data) {
            this.jobs = [];
            this.jobs = data.data;
            this.selectedJob = this.jobs[0];
        },
        clearFilter(){
            this.selectedCategory = null
            this.selectedWorkType = []
            this.selectedDistricts = null

            this.getJobList();
        },
        horizonright(){
            console.log(this.$refs.horizontal.scrollLeft)
            this.$refs.horizontal.scrollLeft += 75;
        },
    },
    watch: {
        selectedCity() {
            this.districts = []
            this.selectedDistricts = null
            axios.get(apiUrl + `city/${this.selectedCity}/district`)
                .then(resp => {
                    this.districts = resp.data.map((q) => {
                        return { label: q.name, value: q.id };
                    })
                })
        },
        selectedCategory() {
            this.getJobList()
        },
    }
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

.job-list-container {
    height: 48rem;
    padding-left: 2px;
    padding-right: 2px;
    margin-left: 2px;
    margin-right: 2px;
    overflow-y: scroll;
    /*overflow-x: hidden;*/
}

.job-drawer-container {
    height: 90vh;
    overflow: scroll;
}

/* ===== Scrollbar CSS ===== */
/* Firefox */
* {
    scrollbar-width: 2px;
    scrollbar-color: #7d767f #ffffff;
}

/* Chrome, Edge, and Safari */
*::-webkit-scrollbar {
    width: 1px;
}

*::-webkit-scrollbar-track {
    background: #ffffff;
}

*::-webkit-scrollbar-thumb {
    background-color: #7d767f;
    border-radius: 10px;
    border: 1px solid #ffffff;
}

.horizontal-scroll {
    overflow: hidden;
    white-space: nowrap;

}
p{
    font-weight:bold;
    font-size:18px
}

@media screen and (max-width: 600px) {
    .horizontal-scroll {
        overflow: auto !important;
        white-space: nowrap;
    }

    *::-webkit-scrollbar-thumb {
        background-color: #f4f5fa !important;
        border: 0px;
        border-radius: 0px !important;
        width: 100% !important;
    }

    .Filtrele {
        align-self: center;
        font-size:12px;
    }
.pop-up-fixed{
    margin-bottom: 0px !important;
}

.job-list-container{
    height: auto;
    padding: 15px !important;
    overflow: hidden !important;
    margin-bottom: 10px !important;
}
.job-list-card{
    padding-left: 10px !important;
    padding-right: 10px !important;
    border-radius: 12px;
    box-shadow: 1px 0 2px 2px #0000002f;
    margin-bottom: 10px !important;
}
.active-job {
    outline: none !important;
    border:0 !important;
    box-shadow: 0 !important;
    width: auto !important;
    height: auto !important;
}
.el-image__inner {
    border-radius:15px !important;
}

}
</style>
