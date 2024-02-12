<template>
    <div class="card my-3">
        <div class="card-body d-flex justify-content-center">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter Order By
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <Link class="dropdown-item" :href="route('order.tasks' , ['id' , 'asc'])">
                            ID <i class="fas fa-arrow-up"></i>
                        </Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="route('order.tasks' , ['id' , 'desc'])">
                            ID <i class="fas fa-arrow-down"></i>
                        </Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="route('order.tasks' , ['title' , 'asc'])">
                            Title A-Z
                        </Link>
                    </li>
                    <li>
                        <Link class="dropdown-item" :href="route('order.tasks' , ['title' , 'desc'])">
                            Title Z-a
                        </Link>
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
