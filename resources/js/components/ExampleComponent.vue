<template>
    <div class="container">
        <div class="row no-gape">
            <div class="col-lg-10 column mx-auto">
                <div class="padding-left">
                    <form-wizard color="#8b91dd" subtitle="" title="İş ilanı ver"
                         backButtonText="Geri"
                         nextButtonText="İleri"
                         finishButtonText="Yayınla"
                         stepSize="sm"
                         ref="wizard"
                         @on-complete="onSubmit"
                                 class="'mb-5'"
                    >
                        <wizard-step
                            slot-scope="props"
                            slot="step">
                        </wizard-step>
                        <div slot="finish" class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">Yayınla!</a>
                            </div>
                        </div>
                        <div slot="next" class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">İleri</a>
                            </div>
                        </div>
                        <div slot="prev" class="col-lg-12">
                            <div class="browse-all-cat">
                                <a href="#" title="">Geri</a>
                            </div>
                        </div>
                        <tab-content title="Kategori secimi" icon="la la-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cat-sec">
                                        <div class="row no-gape">

                                            <div @click="categoryClicked(category)"  v-for="category in categories" class="col-lg-4 col-md-4 col-sm-5 text-center">
                                                <div class="p-category mx-auto">
                                                    <a href="#" title="">
                                                        <img style="
                                                        width: 200px;
                                                         height: 200px;
                                                         object-fit: cover;"
                                                             :src="category.default_cover_image"
                                                             :alt="category.name"
                                                             class="mx-auto"
                                                        >
                                                        <span>{{category.name}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="İş Detayı" icon="la la-info">
                            <div class="col-lg-12 text-center">
                                <span class="pf-title">Resim ve videolar yükleyiniz</span>
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
                                    :on-success="handleSuccess"
                                    multiple
                                    accept="image/*,video/*"
                                >
                                    <i class="el-icon-plus"></i>
                                </el-upload>
                                <el-dialog :visible.sync="dialogVisible">
                                    <img width="100%" :src="dialogImageUrl" alt="">
                                </el-dialog>
                            </div>

                            <div class="col-lg-12">
                                <span class="pf-title">İlan Başlığı </span>
                                <div class="pf-field">
                                    <input v-model="formInline.title" name="title" type="text" placeholder="Başlık"/>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <span class="pf-title">İş tanımı</span>
                                <div class="pf-field">
                                    <textarea v-model="formInline.description" class="mytextarea" placeholder="Sizinle çalışırken ne iş yapacağı, kaç saat çalışacağı gibi bilgileri yazınız...Aylık ya da haftalık ücret, yol yemek parası, sigorta gibi çalışana sağlayacağınız şartları yazınız..."></textarea>
                                </div>
                            </div>
                        </tab-content>
                        <tab-content title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                            <div class="row">
                                <div class="col-lg-6">
                                    <span class="pf-title">Ücret</span>
                                    <div class="pf-field">
                                        <el-button @click="fee_disabled=!fee_disabled">Ücret belirtmek istemiyorum
                                        </el-button>
                                        <el-input-number :disabled="fee_disabled" v-model="formInline.fee" :min="5500"
                                                         :step="500"></el-input-number>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                 <div class="row">
                                     <div class="col-6">
                                         <span class="pf-title">Şehir</span>
                                         <div class="pf-field">
                                             <v-select :options="cities" v-model="formInline.city"></v-select>
                                         </div>
                                     </div>
                                     <div class="col-6">
                                         <div class="pf-field">
                                             <span class="pf-title">İlçe</span>
                                             <div class="pf-field" id="districtSelect">
                                                 <v-select :options="districts" v-model="formInline.district"></v-select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                </div>
                                <div class="col-lg-6">
                                    <span class="pf-title">Cinsiyet</span>
                                    <div class="pf-field">
                                        <v-select :options="genders" v-model="formInline.gender"></v-select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <span class="pf-title">Çalışma Türü</span>
                                    <div class="pf-field">
                                        <v-select :options="work_types"
                                                  v-model="formInline.work_type"></v-select>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                    </form-wizard>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import 'vue-select/dist/vue-select.css';
const appUrl = process.env.MIX_API_URL;
export default {
        props: ['csrf'],
        data() {
            return {
                dialogImageUrl: '',
                dialogVisible: false,
                formInline: {
                    title: null,
                    category_id:null,
                    description:null,
                    work_type:null,
                    city:null,
                    district:null,
                    fee:null,
                    gender:null,
                },
                percentage: 0,
                fileList: [],
                url: '',
                id: '',
                actualFiles: [],
                fee_disabled:false,
                categories:[],
                actionUrl:appUrl+'job',
                cities:[],
                work_types:[],
                genders:[],
                districts:[],
            }
        },
        mounted() {
            this.getDatas()
        },
        methods: {
            onSubmit() {

                let { uploadFiles } = this.$refs.upload
                let form = new FormData()
                Object.entries(this.formInline).map( ([key, val] = entry) => {
                    form.append(key,val)
                });

                uploadFiles.forEach(item => {
                    form.append('files[]', item.raw)
                })

                axios.post(
                    this.actionUrl,
                    form,
                    {
                        headers: {
                            'X-CSRF-TOKEN': this.csrf,
                            'content-type': 'multipart/form-data'
                        },
                        onUploadProgress: this.handleProgress
                    })
                    .then(resp => {
                        this.getDatas();
                        this.$refs.upload.clearFiles()
                    })
            },
            handleProgress(progressEvent) {
                let pers = Math.floor((progressEvent.loaded * 100) / progressEvent.total);
                this.percentage = pers
            },
            handleUploadChange(file) {
                this.actualFiles.push(file);
            },
            handleSuccess(file, fileList) {
                // this.getDatas()
                this.$refs.upload.clearFiles()
                this.$notify({
                    title: 'File Uploaded',
                    type: 'success',
                    message: 'Check the files below'
                });
            },
            handleRemove(file, fileList) {
                this.actualFiles.pop();
            },
            fileAdded(files) {
                console.log(files)
            },
            getDatas() {
                axios.get(appUrl+'job-create-data').then(resp=>{
                    console.log(resp.data)
                    this.categories = resp.data.categories
                    this.cities = resp.data.cities.map(q=>{return {label:q.name,value:q.id}})
                    this.work_types = resp.data.work_types.map(q=>{return {label:q.name,value:q.id}})
                    this.genders = resp.data.genders.map(q=>{return {label:q.name,value:q.id}})
                    this.districts = resp.data.districts.map(q=>{return {label:q.name,value:q.id}})

                    this.formInline.gender = this.genders.filter(q=>q.label == 'Erkek')[0]
                    this.formInline.work_type = this.work_types.filter(q=>q.value == 1)[0]
                    this.formInline.city = this.cities.filter(q=>q.value === resp.data.selected_city.id)[0]
                })
            },

            categoryClicked(category){
                axios.get(appUrl+'category/'+category.id+'/sub-category')
                .then(resp=>resp.data)
                .then(resp=>{
                    if (resp.length > 1){
                        this.categories = resp
                    }else{
                        this.formInline.category_id = category.id
                        this.$refs.wizard.nextTab()
                    }
                })
            }
        }
    }
</script>
<style>
.vue-form-wizard .wizard-icon-circle .wizard-icon-container{
    border-radius: 60%;
}
.vue-form-wizard .wizard-tab-content {
    padding: 65px 20px 10px;
}
.el-input__inner{
    background-color: #3cb0e6!important;
    color: white;
    font-weight: 600;
    font-size: 20px;
}
</style>
