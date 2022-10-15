<template>
    <div class="container-fluid">
        Merhaba
        Nasılsın
        Vue
    </div>
</template>


<script>
export default {
    data() {
        return {
            categories: [],
        }
    },

    mounted() {
        this.testMethod();
    },

    methods:{
        testMethod(){
            axios.get('/api/job-categories').then(data => {
                console.log(data)
            })
        },
        firstMethod(){
            alert('sayfa acilmadan calisirim')
        }
    }
}
</script>
