<template>
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter By category
                            </button>
                            <ul class="dropdown-menu">
                                <li >
                                    <a class="dropdown-item" href="#">all</a>
                                </li>
                                <li v-for="category in categories" :key="category.id">
                                    <Link class="dropdown-item" :href="route('category.tasks' , category.id)">{{ category.name }}</Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'


const props = defineProps({
    categories: {
        type: Array,
        required : true,
    },
});
</script>

<style>

</style>
