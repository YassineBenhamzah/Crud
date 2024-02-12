<template>
  <div class="container">
    <div class="row my-5">
        <div class="col-md-6 mx-auto">
            <card class="card">
                <div class="card-header">
                    <h5 class="text-center mt-2">
                           Create new tasks
                    </h5>
                </div>
                <div class="card-body">
                    <form action="" @submit.prevent="addTask">
                        <div class="mb-3">
                            <label for="title">
                                Title
                            </label>
                            <input type="text" v-model="form.title" placeholder="title*" class="form-control">
                            <div v-if="form.errors.title" class="bg-danger text-white rounded p2">{{ form.errors.title[0] }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="title">
                                Body
                            </label>
                            <textarea rows="5" cols="30" v-model="form.body" placeholder="body*" class="form-control"></textarea>
                            <div v-if="form.errors.body" class="bg-danger text-white rounded p2">{{ form.errors.body[0] }}</div>

                        </div>
                        <div class="mb-3">

                            <select class="form-select" v-model="form.category_id">
                                <option value="" selected disabled>Choose Category</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                            </select>
                            <div v-if="form.errors.category_id" class="bg-danger text-white rounded p2">{{ form.errors.category_id[0] }}</div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </card>
        </div>
    </div>
  </div>
</template>

<script setup>
import {  useForm } from "@inertiajs/vue3";
import Category from '@/Components/Category.vue';
const form = useForm({
    title: '',
    body : '',
    category_id: '',
});


const props = defineProps({
    categories: {
        type: Array,
        required : true,
    },
});

const addTask = () => {
    form.post('/tasks');
}

</script>

<style>

</style>
