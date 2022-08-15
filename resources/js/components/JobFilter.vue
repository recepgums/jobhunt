<template>
    <div>

       <el-col :span="24">
           <el-row :gutter="10" class="d-none d-md-block">
               <el-col :span="4"><div class="grid-content bg-purple">
                   <v-select multiple  :options="options"></v-select>
               </div></el-col>
               <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
               <el-col :span="4"><div class="grid-content bg-purple"></div></el-col>
               <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
               <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
               <el-col :span="4"><div class="grid-content bg-purple-light"></div></el-col>
           </el-row>
       </el-col>
        <el-row>
            <el-col :span="12">
                <div class="grid-content bg-purple-light">
                    task cards
                </div>
            </el-col>
            <el-col :span="12">

                <div class="grid-content bg-purple-light">
                    task detail
                </div>
            </el-col>
        </el-row>
    </div>
</template>

<script>
import vSelect from 'vue-select'
export default {
    data() {
        return {
            options: [
                'foo',
                'bar',
                'baz'
            ]
        }
    },
    components:{
        'v-select':vSelect
    }
}
</script>

<style>
.el-col {
    border-radius: 4px;
}
.bg-purple-dark {
    background: #99a9bf;
}
.bg-purple {
    background: #d3dce6;
}
.bg-purple-light {
    background: #e5e9f2;
}
.grid-content {
    border-radius: 4px;
    min-height: 36px;
}
</style>
