<template>
    <div class="container">
        <h1>{{name}}</h1>
        <div class="form-group">
            <label class="col-form-label">Изменить название доски</label>
            <input type="text" @blur="saveName" v-model="name" class="form-control" :class="{ 'is-invalid': $v.name.$error }">

            <div class="invalid-feedback" v-if="!$v.name.required">
                Обязательное поле
            </div>
            <div class="invalid-feedback" v-if="!$v.name.maxLength">
                Максимальное количевство символов: {{$v.name.$params.maxLength.max}}
            </div>
        </div>
        <br>
        <form @submit.prevent="addNewDeskList">

            <div class="form-group">
                <label class="col-form-label">Добавление списка</label>
                <input type="text" v-model="desk_list_name" @blur="addNewDeskList" placeholder="Введите название списка" class="form-control" :class="{ 'is-invalid': $v.desk_list_name.$error }">
                <div class="invalid-feedback" v-if="!$v.desk_list_name.required">
                    Обязательное поле
                </div>

                <div class="invalid-feedback" v-if="!$v.desk_list_name.maxLength">
                    Максимальное количевство символов: {{$v.desk_list_name.$params.maxLength.max}}
                </div>

                <div class="alert alert-danger" role="alert" v-if="errored">
                    Ошибка <br>
                    {{errors[0]}}
                </div>
            </div>
            <button type="button" class="btn btn-primary mb-3">Создать список</button>

        </form>

        <div class="row">
            <div class="col-lg-4" v-for="(desk_list, index)  in desk_lists">
                <div class="card mt-3">
                    <div class="card-body">
                        <form @submit.prevent="updateDeskList(desk_list.id, desk_list.name)" v-if="desk_list_input_id == desk_list.id" class="d-flex justify-content-between align-items-center">
                            <input type="text" v-model="desk_list.name" class="form-control" :class="{ 'is-invalid': $v.desk_lists.$each[index].name.$error }" placeholder="Введите название task">
                            <div class="invalid-feedback" v-if="!$v.desk_lists.$each[index].name.required">
                                Обязательное поле
                            </div>
                            <div class="invalid-feedback" v-if="!$v.desk_lists.$each[index].name.maxLength">
                                Максимальное количевство символов: {{$v.desk_lists.$each[index].name.$params.maxLength.max}}
                            </div>
                            <button type="button" @click="updateDeskList(desk_list.id, desk_list.name)" class="btn-close" aria-label="Close"></button>
                        </form>
                        <h4 v-else class="card-title d-flex justify-content-between align-items-center"  style="color: rgb(90, 90, 90)" @click="desk_list_input_id = desk_list.id">{{desk_list.name}} <i class="fa-solid fa-pencil" style="cursor: pointer; font-size: 15px;"></i></h4>
                        <button type="submit" class="btn btn-danger mt-3" @click="deleteDeskList(desk_list.id)">Удалить</button>
                        <div class="card mt-3 bg-light" v-for="card in desk_list.cards" :key="card.id">
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between align-items-center mb-3">{{card.name}}</h4>
                                <button type="button" @click="getCard(card.id)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   Показать
                                </button>
                                <button type="button" class="btn btn-secondary" @click="deleteCard(card.id)">Удалить</button>
                            </div>
                        </div>
                        <form @submit.prevent="addNewCard(desk_list.id)" class="d-flex justify-content-between align-items-center mt-3">
                            <input type="text" v-model="card_names[desk_list.id]" class="form-control" :class="{ 'is-invalid': $v.card_names.$each[desk_list.id].$error }" placeholder="Введите название карточки">
                            <div class="invalid-feedback" v-if="!$v.card_names.$each[desk_list.id].required">
                                Обязательное поле
                            </div>
                            <div class="invalid-feedback" v-if="!$v.card_names.$each[desk_list.id].maxLength">
                                Максимальное количевство символов: {{$v.card_names.$each[desk_list.id].$params.maxLength.max}}
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <form @submit.prevent="updateCardName" v-if="show_card_name_input" class="d-flex justify-content-between align-items-center">
                                            <input type="text" v-model="current_card.name"  class="form-control" :class="{ 'is-invalid': $v.current_card.name.$error }" placeholder="Изменить название task">
                                            <div class="invalid-feedback" v-if="!$v.current_card.name.required">
                                                Обязательное поле
                                            </div>
                                            <div class="invalid-feedback" v-if="!$v.current_card.name.maxLength">
                                                Максимальное количевство символов: {{$v.current_card.name.$params.maxLength.max}}
                                            </div>
                                            <button type="button" class="btn-close"  @click="updateCardName" aria-label="Close"></button>
                                        </form>
                                        <h5 class="modal-title" v-if="!show_card_name_input" @click="show_card_name_input = true" id="exampleModalLabel">{{current_card.name}} <i class="fa-solid fa-pencil ml-3 " style="cursor: pointer; font-size: 15px;"></i></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-check" v-for="(task, index) in current_card.tasks">
                                            <input class="form-check-input" type="checkbox" @change="updateTask(current_card.tasks[index])" :id="'inlineCheckbox1' + index" v-model="current_card.tasks[index].is_done">
                                            <form @submit.prevent="updateTask(current_card.tasks[index])" v-if="task_input_name_id == task.id">
                                                <input type="text" v-model="current_card.tasks[index].name" v-if="task_input_name_id == task.id" class="form-control" placeholder="Изменить название tasks">
                                            </form>
                                            <label v-else class="form-check-label" :for="'inlineCheckbox1' + index">{{task.name}} </label> <span @click="task_input_name_id = task.id" v-if="task_input_name_id != task.id"> <i class="fa-solid fa-pencil ml-3 " style="cursor: pointer; font-size: 15px;"></i></span>
                                            <button type="button" @click="deleteTask(task.id)" class="btn-close" aria-label="Close"></button>
                                            <div class="card">
                                                {{task.description}}
                                            </div>
                                        </div>
                                        <form @submit.prevent="addNewTask" class="mt-3">
                                            <div class="form-group" >
                                                <label class="col-form-label">Добавление task</label>
                                                <input type="text" v-model="new_task_name" placeholder="Введите название задачи" class="form-control" :class="{ 'is-invalid': $v.new_task_name.$error }">

                                                <input type="text" v-model="description_task" placeholder="Введите текст" class="form-control mt-2" :class="{ 'is-invalid': $v.description_task.$error }">
                                                <div class="invalid-feedback" v-if="!$v.new_task_name.required">
                                                    Обязательное поле
                                                </div>
                                                <div class="invalid-feedback" v-if="!$v.new_task_name.maxLength">
                                                    Максимальное количевство символов: {{$v.new_task_name.$params.maxLength.max}}
                                                </div>
                                                <div class="alert alert-danger" role="alert" v-if="errored">
                                                    Ошибка <br>
                                                    {{errors[0]}}
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-2">Отправить</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="alert alert-danger" role="alert"  v-if="errored">
            Ошибка загрузки данных!
        </div>

        <div class="spinner-grow" style="width: 5rem; height: 5rem;" role="status" v-if="loading">
            <span class="visually-hidden">Loading...</span>
        </div>

    </div>

</template>

<script>

import { required, maxLength } from 'vuelidate/lib/validators'

export default {
    props: [
        'deskId'
    ],
    data(){
        return{
            name: null,
            desk_list_name: null,
            errored: false,
            loading: true,
            desk_lists: true,
            desk_list_input_id: null,
            card_names: [],
            current_card: [],
            show_card_name_input: false,
            new_task_name: '',
            description_task: '',
            task_input_name_id: null,
        }
    },
    methods:{
        updateTask(task){
            axios.post('/api/tasks/' + task.id, {
                _method: 'PATCH',
                name: task.name,
                is_done: task.is_done,
                card_id: task.card_id,

                description_task: task.description
            })
                .then(response => {
                    this.task_input_name_id = null
                    this.getCard(this.current_card.id)
                    console.log(response.data.data)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
        },
        deleteTask(id){
            axios.post('/api/tasks/' + id, {
                _method: 'DELETE',
                card_id: this.current_card.id,
            })
                .then(response => {
                    this.getCard(this.current_card.id)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
        },
        addNewTask(){
            axios.post('/api/tasks', {
                name: this.new_task_name,
                description: this.description_task,
                card_id: this.current_card.id,
            })
                .then(response => {
                    this.new_task_name = ''
                    this.description_task = ''
                    this.getCard(this.current_card.id)
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
        },
        updateCardName(){
            this.$v.current_card.name.$touch()
            if (this.$v.current_card.name.$anyError){
                return;
            }
            this.show_card_name_input = false
            axios.post('/api/cards/' + this.current_card.id , {
                _method: 'PATCH',
                name: this.current_card.name,
                desk_list_id: this.current_card.desk_list_id,
            })
                .then(response => {
                    this.show_card_name_input = false
                    this.getDeskList()
                     this.$v.reset()
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
        },
        getCard(id){
            axios.get('/api/cards/' + id)
                .then(response => {
                    this.current_card = response.data.data
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
        },
        deleteCard(id){
            if(confirm('Вы хотите удалить')) {
                axios.post('/api/cards/' + id , {
                    _method: 'DELETE',
                })
                    .then(response => {
                        this.getDeskList()
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
            }
        },
        addNewCard(desk_list_id){
            this.$v.card_names.$each[desk_list_id].$touch()
            if (this.$v.card_names.$each[desk_list_id].$anyError){
                return;
            }
            axios.post('/api/cards/' , {
                name: this.card_names[desk_list_id],
                desk_list_id
            })
                .then(response => {
                    this.card_names[desk_list_id] = ''
                    this.getDeskList()
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })

        },
        updateDeskList(id, name){
            this.$v.desk_lists.$touch()
            if (this.$v.desk_lists.$anyError){
                return;
            }
            this.desk_list_input_id = false
            axios.post('/api/desk-lists/' + id, {
                _method: 'PUT',
                name: name
            })
                .then(response => {
                    this.desk_list_input_id = null
                    this.getDeskList()
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() =>{
                    this.loading = false
                })
        },
        getDeskList(){
            axios.get('/api/desk-lists/' , {
               params: {
                   desk_id: this.deskId
               }
            })
                .then(response => {
                    this.desk_lists = response.data.data
                    this.desk_lists.forEach(el => {
                        this.card_names[el.id] = ''
                    })
                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() =>{
                    this.loading = false
                })
        },
        saveName(){
            this.$v.name.$touch()
            if (this.$v.name.$anyError){
                return
            }
            axios.post('/api/desks/' + this.deskId, {
                _method: 'PUT',
                name: this.name,
            })
                .then(response => {

                })
                .catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() =>{
                    this.loading = false
                })
        },
        addNewDeskList(){
            axios.post('/api/desk-lists' , {
                name: this.desk_list_name,
                desk_id: this.deskId,

            })
                .then(response => {
                    this.desk_list_name = ''
                    this.desk_lists = []
                    this.getDeskList()
                })
                .catch(error => {
                    console.log(error)
                    if(this.errors.push(error.response.data.errors.name)){
                        this.errors = []
                        this.errors.push(error.response.data.errors.name[0])
                    }
                    this.errored = true
                })
                .finally(() =>{
                    this.loading = false
                })
        },
        deleteDeskList(id){
            if(confirm('Вы хотите удалить desk?')){
                axios.post('/api/desk-lists/' + id, {
                    _method: 'DELETE'
                })
                    .then(response => {
                        this.desk_lists = []
                        this.getDeskList()
                    })
                    .catch(error => {
                        console.log(error.response)
                        this.errored = true
                    })
                    .finally(() =>{
                        this.loading = false
                    })
            }
        },
    },
    mounted() {
        axios.get('/api/desks/' + this.deskId)
            .then(response => {

            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() =>{
                this.loading = false
            })
        this.getDeskList()
    },
    validations: {
        name: {
            required,
            maxLength: maxLength(255)
        },
        desk_list_name: {
            required,
            maxLength: maxLength(255)
        },
        card_names: {
            $each: {
                required,
                maxLength: maxLength(255)
            }
        },
        current_card: {
            name: {
                required,
                maxLength: maxLength(255)
            }
        },
        new_task_name:{
            required,
            maxLength: maxLength(255)
        },
        description_task:{
          required,
          maxLength: maxLength(255)
        },
        desk_lists: {
            $each: {
                name: {
                    required,
                    maxLength: maxLength(255)
                }
            }
        }
    }
}
</script>
