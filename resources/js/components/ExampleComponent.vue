<template>
    <div class="container ">
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
                                        <a href="#" title="">Sonraki</a>
                                    </div>
                                </div>
                                <div slot="prev" class="col-lg-12">
                                    <div class="browse-all-cat">
                                        <a href="#" title="">Önceki</a>
                                    </div>
                                </div>
                                <tab-content title="Kategori secimi" icon="la la-info">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cat-sec">
                                                <div class="row no-gape">
                                                    <div @click="categoryClicked(category)"  v-for="category in categories" class="col-lg-4 col-md-4 col-sm-6">
                                                        <div class="p-category">
                                                            <a href="#" title="">
                                                                <img style="
                                                                width: 200px;
                                                                 height: 200px;
                                                                 object-fit: cover;"
                                                                     :src="category.default_cover_image"
                                                                     :alt="category.name"
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
                                    <div class="col-lg-12">
                                        <span class="pf-title">Başlık</span>
                                        <div class="pf-field">
                                            <input v-model="formInline.title" name="title" type="text" placeholder="Başlık"/>
                                        </div>
                                    </div>

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
                                        <span class="pf-title">İşçiden beklediğiniz göevler</span>
                                        <div class="pf-field">
                                            <textarea v-model="formInline.tasks" class="mytextarea" placeholder="Sizinle çalışırken ne iş yapacağı, kaç saat çalışacağı gibi bilgileri yazınız..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">İşçiye sağlayacağınız koşullar</span>
                                        <div class="pf-field">
                                            <textarea v-model="formInline.benefits" class="mytextarea" placeholder="Aylık ya da haftalık ücret, yol yemek parası, sigorta gibi çalışana sağlayacağınız şartları yazınız..."></textarea>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="Paket Seçimi ve Ödeme" icon="la la-cc-mastercard">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Çalışma Türü</span>
                                        <div class="pf-field">
                                            <select v-model="formInline.work_type_id" name="work_type_id" data-placeholder="Please Select Specialism"
                                                    class="chosen">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Şehir</span>
                                        <div class="pf-field">
                                            <select name="city_id" data-placeholder="Please Select Specialism"
                                                    class="chosen" >
                                                <option value></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">İlçe</span>
                                        <div class="pf-field" id="districtSelect">
                                            <select name="district_id" data-placeholder="İlçe Seçin"
                                                    class="chosen-city">
                                                <option value></option>
                                            </select>
                                        </div>
                                    </div>
                                </tab-content>
                                <tab-content title="İlanınız Yayında!" icon="la  la-check-circle">
                                    <div class="col-lg-6">
                                        <span class="pf-title">Ücret</span>
                                        <div class="pf-field">
                                            <input v-model="formInline.fee" name="fee" type="number" placeholder="Ucret" >
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Cinsiyet</span>
                                        <div class="pf-field">
                                            <select name="gender_id" data-placeholder="Please Select Specialism" class="chosen">

                                            </select>
                                        </div>
                                    </div>
                                </tab-content>
                            </form-wizard>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
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
                    tasks:null,
                    benefits:null,
                    work_type_id:null,
                    city_id:null,
                    district_id:null,
                    fee:null,
                    gender_id:null,
                },
                percentage: 0,
                fileList: [],
                url: '',
                id: '',
                actualFiles: [],

                categories:[],
                actionUrl:appUrl+'job'
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
                this.getDatas()
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
                axios.get(appUrl+'job-categories').then(resp=>{
                    this.categories = resp.data
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
</style>
