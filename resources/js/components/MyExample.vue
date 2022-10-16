<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Your name" v-model="form.name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="name@example.com"
                               v-model="form.email">
                    </div>
                    <div class="form-group">
                        <select multiple class="form-control" id="exampleFormControlSelect2" v-model="form.profession">
                            <option value="developer">Developer</option>
                            <option value="designer">Graphic Designer</option>
                            <option value="manager">Manager</option>
                            <option value="ceo">Company Head / CEO</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" @click.prevent="submitForm"
                        >Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <h1 v-if="awesome > 40">büyüktür</h1>
        <h1 v-else-if="awesome < 40">küçüktür </h1>
        <h1 v-else>veri 40 eşittir</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">description</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories">
                <td>{{ category.name }}</td>
                <td>{{ category.description }}</td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-12">
                <h1> Km Metre Hesaplaması </h1>
                <input placeholder="km" class="form-control" type="text" v-model="calculation.km"></input>
                <input placeholder="metre" class="form-control" type="text" v-model="calculation.meter"></input>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    //props
    props: ['data'],
    data() {
        return {
            categories: [],
            awesome: 30,
            form: {
                name: '',
                email: '',
                profession: [],
            },
            calculation: {
                km: '',
                meter: '',
            }
        }
    },

    mounted() {
        this.testMethod();
        console.log(this.data)
    },

    watch: {
        categories(yeni, eski) {
            alert(eski.length);
            alert(yeni.length);
        },
        "form.name"(newValue, oldValue) {
            alert(oldValue)
        },
        //km metre hesaplaması
        "calculation.km"(value) {
            value = 1000 * value
            this.calculation.meter = value
            if (value > 5000){
                alert('güzel km')
            }
        },
        "calculation.meter"(value) {
            value = value / 1000
            this.calculation.km = value
        }
    },

    methods: {
        testMethod() {
            //table a verileri çekiyorum
            axios.get('/api/job-categories').then(data => {
                this.categories = data.data;
            })
        },
        submitForm() {
            //form submit ettiğinde verileri alıyorum
            console.log(this.form)
        }
    }
}
</script>
