<template>
    <div class="container-fluid p-0">
        <div class="row no-gape">
            <div class="col-sm-11 col-lg-8 column mx-auto" style="max-width:1250px">
                <div class="padding-left">
                    <el-card class="box-card mt-4" shadow="always">
                        <form-wizard color="#8b91dd" subtitle="" title=""
                                 backButtonText="Geri"
                                 nextButtonText="İleri"
                                 finishButtonText="Yayınla"
                                 stepSize="sm"
                                 ref="wizard"
                                 @on-complete="toPaymentPage"
                    >
                        <wizard-step
                            slot-scope="props"
                            slot="step">
                        </wizard-step>
                        <div slot="title">
                            <div class=" text-white p-2" style="background-color: #F56C6C">
                                İlan Ver
                            </div>
                        </div>
                        <div slot="finish" class="col-lg-12 py-2">
                            <el-button size="medium" style="margin-top: 12px;font-size: 18px;" type="danger">Yayınla!</el-button>
                        </div>
                        <div slot="next" class="col-lg-12 py-2">
                            <el-button size="medium" style="margin-top: 12px;font-size: 18px;" type="danger">İleri</el-button>
                        </div>
                        <div slot="prev" class="col-lg-12 py-2">
                            <el-button size="medium" style="margin-top: 12px;font-size: 18px;" type="danger">Geri</el-button>
                        </div>
                        <tab-content title="Kategori secimi" icon="la la-info">
                            <div class="row">
                                <div @click="categoryClicked(category)" v-for="category in categories"
                                     class="col-lg-4 col-md-4 col-sm-6 col-6">
                                    <a href="#" title="" class="text-center card my-2">
                                        <img style="
                                         object-fit: cover;"
                                             :src="category.default_cover_image"
                                             :alt="category.name"
                                             class="mx-auto"
                                        >
                                        <div class="mx-auto text-center font-weight-bold " style="font-size:18px">
                                            {{ category.name }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="İş Detayı" icon="la la-info">
                            <div class="col-lg-12 px-0">
                                <span class="pf-title mb-4">Resim ve videolar yükleyiniz</span>
                                <el-upload
                                    ref="upload"
                                    :action="actionUrl"
                                    list-type="picture-card"
                                    :headers="{ 'X-CSRF-TOKEN': csrf }"
                                    :on-remove="handleRemove"
                                    :on-change="handleUploadChange"
                                    :file-list="fileList"
                                    :data="formInline"
                                    :on-progress="handleProgress"
                                    :auto-upload="false"
                                    multiple
                                    class="row"
                                    accept="image/*,video/*"
                                >
                                    <i class="el-icon-plus"></i>
                                </el-upload>
                                <el-dialog :visible.sync="dialogVisible">
                                    <img width="100%" :src="dialogImageUrl" alt="">
                                </el-dialog>
                            </div>

                            <div class="col-lg-12 py-2 px-0">
                                <span class="pf-title">İlan Başlığı </span>
                                <div class="pf-field">
                                    <el-input placeholder="Başlık" v-model="formInline.title" minlength="10" size="medium" clearable
                                    />
                                </div>
                            </div>

                            <div class="col-lg-12 py-2 px-0">
                                <span class="pf-title">İş tanımı</span>
                                <div class="pf-field">
                                    <el-input
                                        type="textarea"
                                        :autosize=" { minRows: 6, maxRows: 10 }"
                                        placeholder="Sizinle çalışırken ne iş yapacağı, kaç saat çalışacağı gibi bilgileri yazınız...Aylık ya da haftalık ücret, yol yemek parası, sigorta gibi çalışana sağlayacağınız şartları yazınız..."
                                        v-model="formInline.description">
                                    </el-input>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content :before-change="onSubmit" title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 py-2">
                                    <span class="pf-title">Şehir</span>
                                    <div class="pf-field">
                                        <el-select
                                            filterable
                                            v-model="formInline.city"
                                            placeholder="Select"
                                            @change="cityChangedMethod"
                                        >
                                            <el-option
                                                v-for="item in cities"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-2">
                                    <div class="pf-field">
                                        <span class="pf-title">İlçe</span>
                                        <div class="pf-field" id="districtSelect">
                                            <el-select v-model="formInline.district" placeholder="Select">
                                                <el-option
                                                    v-for="item in districts"
                                                    :key="item.value"
                                                    :label="item.label"
                                                    :value="item.value">
                                                </el-option>
                                            </el-select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-2">
                                    <span class="pf-title">Telefon numaranız</span>
                                    <div class="pf-field">
                                        <VuePhoneNumberInput
                                            ref="vuePhoneTel"
                                            default-country-code="TR"
                                            v-model="formInline.phone"/>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-2">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span class="pf-title">Aylık ücret</span>
                                            <div class="pf-field">
                                                <el-input-number class="mx-auto"  style="width: 100%" :disabled="fee_disabled" v-model="formInline.fee"
                                                                 :min="5500"
                                                                 :step="500" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="pf-field pf-title" style="padding:13px 0">
                                                <el-button
                                                    style="padding: 12px 5px"
                                                    @click="fee_disabled=!fee_disabled">Ücret belirtmek istemiyorum
                                                </el-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-2">
                                    <span class="pf-title">Cinsiyet</span>
                                    <div class="pf-field">
                                        <el-select v-model="formInline.gender" placeholder="Select">
                                            <el-option
                                                v-for="item in genders"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 py-2">
                                    <span class="pf-title">Çalışma türü</span>
                                    <div class="pf-field">
                                        <el-select v-model="formInline.work_type" placeholder="Select">
                                            <el-option
                                                v-for="item in work_types"
                                                :key="item.value"
                                                :label="item.label"
                                                :value="item.value">
                                            </el-option>
                                        </el-select>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="Paket Seçimi ve Ödeme2" icon="la la-cc-mastercard">
                            <div class="plans-sec">
                                <div class="row">
                                    <h1>Başvuru sayısını arttırın!</h1>

                                    <div @click="formInline.package_id = c.id" class="col-lg-4" v-for="c in packages">
                                        <el-card  :body-style="{ padding: '0px' }">
                                            <img src="/assets/images/src/img.png" class="image">
                                            <div style="padding: 14px;">
                                                <span>Yummy hamburger</span>
                                                <div class="bottom clearfix">
                                                    <time class="time">{{c.name}}</time>
                                                    <el-button type="text" class="button">Operating</el-button>
                                                </div>
                                            </div>
                                        </el-card>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                    </form-wizard>
                    </el-card>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue-select/dist/vue-select.css';
import 'vue-phone-number-input/dist/vue-phone-number-input.css';

import VuePhoneNumberInput from 'vue-phone-number-input';
import JobSingle from "./JobSingle";

const apiUrl = process.env.MIX_API_URL;
const appUrl = process.env.APP_URL;
export default {
    props: ['csrf','telefon'],
    components: {
        VuePhoneNumberInput,
        JobSingle
    },
    data() {
        return {
            dialogImageUrl: '',
            dialogVisible: false,
            formInline: {
                title: null,
                category_id: null,
                description: null,
                work_type: null,
                city: null,
                district: null,
                fee: null,
                gender: null,
                package_id: null,
                phone: null,
                sleep_after_at: null
            },
            percentage: 0,
            slug: null,
            isJobCreated: false,
            fileList: [],
            url: '',
            id: '',
            actualFiles: [],
            fee_disabled: false,
            categories: [],
            actionUrl: appUrl + '/ilan',
            cities: [],
            work_types: [],
            genders: [],
            districts: [],
            packages: [],
            job:null
        }
    },
    mounted() {
        this.getDatas()
    },
    methods: {
        onSubmit() {
            if (this.isJobCreated) {
                return true
            }
            let {uploadFiles} = this.$refs.upload
            let form = new FormData()
            uploadFiles.forEach(item => {
                form.append('files[]', item.raw)
            })

            form.append('gender_id', this.formInline.gender ?? null)
            form.append('work_type_id', this.formInline.work_type ?? null)
            form.append('city_id', this.formInline.city ?? null)
            form.append('district_id', this.formInline.district ?? null)
            form.append('title', this.formInline.title)
            form.append('description', this.formInline.description)
            form.append('fee', this.formInline.fee ?? null)
            form.append('category_id', this.formInline.category_id)
            form.append('phone', this.formInline.phone)
            form.append('sleep_after_at', this.formInline.sleep_after_at)

            axios.post(
                '/ilan',
                form,
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrf,
                        'content-type': 'multipart/form-data',
                        'Accept' : 'application/json'
                    },
                    onUploadProgress: this.handleProgress
                })
                .then(resp => {
                    this.job = resp.data.job
                    this.isJobCreated = true;
                    this.$refs.wizard.nextTab();
                })
                .catch(err => {
                    //todo
                    this.$notify({
                        title: 'Eksik alanları doldurunuz.',
                        type: 'error',
                        message: err.response.data.message
                    });
                })
        },

        toPaymentPage() {
            if (!this.job.slug) {
                this.$notify({
                    title: 'Is ilani olustururken hata olustu!',
                    type: 'error',
                    message: 'Sayfayi yenileyip tekrar deneyiniz 🙏'
                });

                return false
            }

            axios.get(
                '/ilan/' + this.job.slug + '/paket/' + this.formInline.package_id + '/api',
                {
                    headers: {
                        'X-CSRF-TOKEN': this.csrf,
                    },
                })
                .then(resp => {
                    setTimeout(() => {
                        window.location.href = window.location.origin + '/ilan/' + this.job.slug + '/odeme';

                    }, 500)

                })
                .catch(err => {
                    //todo
                    this.$notify({
                        title: 'Eksik alanları doldurunuz.',
                        type: 'error',
                        message: err.response.data.message
                    });
                })
        },
        handleProgress(progressEvent) {
            let pers = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
            this.percentage = pers
        },
        handleUploadChange(file) {
            this.actualFiles.push(file);
        },
        handleRemove(file, fileList) {
            this.actualFiles.pop();
        },
        cityChangedMethod(){
            this.formInline.district = null;
            let selectedCity = this.formInline.city
            axios.get(apiUrl +`city/${selectedCity}/district` )
                .then(resp => {
                    this.districts = resp.data.map(q => {
                        return {label: q.name, value: q.id}
                    })
                })
        },
        getDatas() {
            axios.get(apiUrl + 'job-create-data').then(resp => {
                this.categories = resp.data.categories
                this.cities = resp.data.cities.map(q => {
                    return {label: q.name, value: q.id}
                })
                this.work_types = resp.data.work_types.map(q => {
                    return {label: q.name, value: q.id}
                })
                this.genders = resp.data.genders.map(q => {
                    return {label: q.name, value: q.id}
                })
                this.districts = resp.data.selected_city.districts.map(q => {
                    return {label: q.name, value: q.id}
                })

                this.formInline.gender = this.genders.filter(q => q.label == 'Erkek')[0]
                this.formInline.work_type = this.work_types.filter(q => q.value == 1)[0]
                this.formInline.city = resp.data.selected_city.id

                this.packages = resp.data.packages
                this.formInline.phone = this.telefon
                this.formInline.package_id = this.packages.filter(q => q.is_highlighted == true)[0].id
            })
        },

        categoryClicked(category) {
            axios.get(apiUrl + 'category/' + category.id + '/sub-category')
                .then(resp => resp.data)
                .then(resp => {
                    if (resp.length > 1) {
                        this.categories = resp
                    } else {
                        this.formInline.category_id = category.id;
                        this.fileList.push({name: category.name, url: category.default_cover_image})
                        this.$refs.wizard.nextTab()
                    }
                })
        }
    }
}
</script>
<style>
.vue-form-wizard {
    margin-left: auto !important;
    margin-right: auto !important;
    max-width: 1800px;
}

.vue-form-wizard .wizard-icon-circle .wizard-icon-container {
    border-radius: 60%;
}

.vue-form-wizard .wizard-tab-content {
    padding: 65px 20px 10px;
}

@media only screen and (max-width: 600px) {
    .vue-form-wizard .wizard-tab-content {
        padding: 35px;
    }
}


.pf-title {
    font-weight: 600;
    font-size: 18px;
    color: #000000;

}

.img-wrap {
    position: relative;
}

.img-wrap .close {
    top: 2px;
    color: red;
    right: 2px;
    z-index: 100;
}
.pf-title{
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 16px;
    padding:20px 0
}
p {
    margin: 0;
}

.el-select{
    width:100%
}

bottom {
    margin-top: 13px;
    line-height: 12px;
}

.button {
    padding: 0;
    float: right;
}

.image {
    width: 100%;
    display: block;
}

.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
}

.clearfix:after {
    clear: both
}
</style>
