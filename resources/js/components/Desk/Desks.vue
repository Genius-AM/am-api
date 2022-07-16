<template>

    <div class="container">
        <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status" v-if="loading">
            <span class="visually-hidden">Loading...</span>
        </div>

        <form @submit.prevent="addNewDesk">
            <div class="form-group">
                <label class="form-label mt-3">Добавление доски</label>
                    <input type="text" v-model="name" @blur="addNewDesk" placeholder="Введите название доски" class="form-control " :class="{ 'is-invalid': $v.name.$error }">
                <div class="invalid-feedback" v-if="!$v.name.required">
                    Обязательное поле
                </div>
                <div class="invalid-feedback" v-if="!$v.name.maxLength">
                    Максимальное количевство символов: {{$v.name.$params.maxLength.max}}
                </div>
                <div class="alert alert-danger" role="alert" v-if="errored">
                Ошибка <br>
                {{errors[0]}}
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-3">Создать</button>
        </form>

        <div class="row">
            <div class="col-lg-3" v-for="desk in desks">
                <div class="card mt-3">
                    <router-link class="card-body" :to="{name: 'showDesk', params: {deskId: desk.id }}">
                        <h4 class="card-title d-flex justify-content-between align-items-center desk-name" style="color: black">{{desk.name}}</h4>
                    </router-link>
                    <button type="submit" class="btn btn-danger" @click="deleteDesk(desk.id)">Удалить</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import { required, maxLength } from 'vuelidate/lib/validators'

export default {

    data(){
        return {
            desks: [],
            errored: false,
            loading: true,
            name: null,
            errors: []
        }
    },
    mounted() {
        this.getAllDesk()
    },
    methods:{
        getAllDesk(){
            axios.get('/api/desks')
                .then(response => {
                    this.desks = response.data.data

                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() =>{
                    this.loading = false
                })
        },
        deleteDesk(id){
            if(confirm('Вы хотите удалить desk?')){
                axios.post('/api/desks/' + id, {
                    _method: 'DELETE'
                })
                    .then(response => {
                        this.desks = []
                        this.getAllDesk()
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() =>{
                        this.loading = false
                    })
            }
        },
        addNewDesk(){
            this.$v.$touch()
            if (this.$v.$anyError){
                return;
            }
            axios.post('/api/desks/' , {
                name: this.name,

            })
                .then(response => {
                    this.name = ''
                    this.desks = []
                    this.getAllDesk()
                })
                .catch(error => {
                    console.log(error.response)
                    if(this.errors.push(error.response.data.errors.name)){
                        this.errors = []
                        this.errors.push(error.response.data.errors.name[0])
                    }
                    this.errored = true
                })
                .finally(() =>{
                    this.loading = false
                })
        }
    },
    validations: {
        name: {
            required,
            maxLength: maxLength(255)
        }
    }
}
</script>

