<template>
    <div v-if="job" style="border-radius:20px;overflow-x: hidden;height:100%">
        <div class="bg-white" style="border-radius:20px;overflow-x: hidden;height:100%">
            <div class="bant ">
                <div></div>
            </div>
            <span class="el-image-viewer__btn el-image-viewer__close d-none" @click="closeDrawer">
            <i class="la la-close"></i>
        </span>
            <div class="tw-flex tw-flex-col tw-row-span-2 w-full">
                <div class="tw-grid tw-col-span-5 text-center mx-auto">
                    <el-image
                        :src="job?.media[0]"
                        class="tw-rounded-xl tw-w-200 tw-h-200 tw-col-span-1"
                        :fit="'fill'"
                        :preview-src-list="job?.media"
                    ></el-image>
                </div>
                <div class="d-flex justify-content-around">
                    <div class="job-property">
                        <i class="la la-clock-o"></i>
                        {{ job?.work_type?.name }}
                    </div>
                    <div class="job-property">
                        <i class="la la-mars-double"></i>
                        {{
                            job?.gender?.name ?? "Farketmez"
                        }}
                    </div>
                    <div class="job-property">
                        <i class="la la-money"></i>
                        {{
                            job?.fee
                                ? job?.fee + " TL"
                                : "Belirtilmemiş"
                        }}
                    </div>
                    <div class="job-property">
                        <i class="el-icon-user"></i>
                        {{ job?.category?.name ?? '' }}
                    </div>
                </div>
            </div>

            <div class="p-3">
                <div >
                    <h1 style="font-size: 18px;font-weight: bolder; text-transform: capitalize;">
                        {{ job?.title }}
                    </h1>
                    <h1 style="color:rgb(251, 35, 106);font-weight: bold;padding-top:0.5rem;">
                        <i class="la la-map-marker"></i>
                        {{ job?.district?.name }},
                        {{ job?.city?.name }}
                    </h1>
                </div>
                <div >
                    <h2 class="mt-4">
                        {{ job?.description }}
                    </h2>
                </div>
                <div class="mt-2" style="position:absolute;bottom:20px;width: 90%">
                    <div class="row">
                        <div class="col-6">
                            <el-button style="width:100%;padding:15px;font-size:16px" @click="seeDetailsClicked" type="primary">
                                Detayları gör
                                <i class="el-icon-right"></i>
                            </el-button>
                        </div>
                        <div class="col-6">
                            <!--                        Mobile-->
                            <el-button class="d-block d-md-none" style="width:100%;font-size:20px" @click="getContactClicked(true)" type="success">
                                Ara
                                <i class="el-icon-phone"></i>
                            </el-button>
                            <el-button class="d-none d-md-block" style="width:100%;font-size:20px" @click="getContactClicked(false)" type="danger">
                                İletişime geç
                                <i class="el-icon-phone"></i>
                            </el-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <el-empty description="İlan Bulunamadı">
            <el-link>
                <a :href="process.env.MIX_API_URL + '/ilan' ">Tüm İlanları Gör</a>
            </el-link>
        </el-empty>
    </div>
</template>

<script>
const apiUrl = process.env.MIX_API_URL;
const appSub = process.env.MIX_SUB;
const appUrl = process.env.APP_URL;
export default {
    props:['job','isloggedin'],
    data() {
        return {
            jobs_index_url:null,
            showContactInformation:false,
        };
    },
    methods:{
        getContactClicked(isMobile = true){
            if (this.isloggedin){
                axios.post( `/${appSub}/ilan/${this.job.slug}/get_contact_info`)
                    .then(resp => {
                        this.showContactInformation = true
                        if (!isMobile){
                            //Desktop
                            this.$confirm(`
                        <img src="${resp.data.profile_image}" alt="">
                            <a href="tel:${resp.data.phone}">
                                      Telefon numarası: ${resp.data.phone}, <br>
                                      Email adresi: ${resp.data.email}
                            </a>
                        `, resp.data.name,
                                {
                                    dangerouslyUseHTMLString: true,
                                    confirmButtonText: 'Tamam',
                                    showCancelButton: false,
                                    showClose: false,
                                });
                        }else {
                            //Mobile
                            this.showContactInformation = true
                            window.location.href = 'tel://0' + resp.data.phone;
                        }
                    })
                this.showContactInformation =true;
            }else{
                window.location.href = '/'+appSub+'/giris'
            }


        },
        seeDetailsClicked(){
            window.location.href = '/'+appSub+'/ilan/' + this.job.slug
        },
        closeDrawer (){
            this.$emit('drawerToggle')
        }
    },
    watch:{
        showContactInformation(){

        },
    }
};
</script>
<style>
.job-property {
    text-align: left;
    color: rgb(95, 101, 158)
}

@media only screen and (max-width: 600px) {
    .el-drawer.btt {
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
    }

    .el-drawer__body {
        overflow: hidden !important;
    }

    .bant {
        margin: 0 5px;
        background-color: black;
        opacity: 0.3;
        height: 7px;
        text-align: center
    }

    .bant div {
        background-color: white;
        width: 30%;
        height: 7px;
        margin-right: auto;
        margin-left: auto;
        border-radius: 10px
    }

    .close-drawer {
        color: white;
        font-size: 40px;
        background-color: red;
        border-radius: 50px;
        width: 20px;
        position: relative;
        right: 10px;
        z-index: 2
    }

    .el-image-viewer__close {
        top: 2px;
        right: 2px;
        display: flex !important;
    }
}
</style>
