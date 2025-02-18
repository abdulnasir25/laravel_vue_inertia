<script setup>
import { ref, watch } from 'vue';
import Pagination from '../Components/Pagination.vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';

const props = defineProps({
    users: Object,
    searchTerm: String
});

const search = ref(props.searchTerm);

// watch for search input
watch(
    search,
    // debounce runs just after the user stops typing for 500ms
    debounce((q) => router.get('/', {search: q}, {preserveState: true}), 500) // preserve state, so it doesn't reset the page
)

// formate date
const getDate = (date) => {
    return new Date(date).toLocaleDateString('en-us', {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
    });
};
</script>

<template>
    <Head>
        <title>{{ $page.component }}</title>
    </Head>

    <div class="mx-auto text-center">
        <!-- search for users -->
        <div class="flex justify-end mt-4">
            <input type="search" v-model="search" class="w-1/4 p-2 border border-gray-300 rounded-md" placeholder="Search for users" />
        </div>

        <!-- users table -->
        <table class="w-full border-collapse border border-gray-300 mt-4 mb-4 bg-white shadow-lg rounded-md overflow-hidden table-auto">
            <thead class="bg-blue-100 text-gray-700 font-bold text-lg">
                <tr class="font-bold text-lg">
                    <th class="w-1/4 p-2">Avatar</th>
                    <th class="w-1/4 p-2 text-left">Name</th>
                    <th class="w-1/4 p-2 text-left">Email</th>
                    <th class="w-1/4 p-2">Created At</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <tr v-for="user in users.data" :key="user.id" class="text-center border border-gray-200 font-normal table-row group hover:bg-blue-100">
                    <td class="w-1/4 p-2 justify-items-center"><img class="w-16 h-16 rounded-full object-cover" :src="user.avatar ? ('storage/' + user.avatar) : ('storage/avatars/default.jpeg')" alt=""></td>
                    <td class="w-1/4 p-2 text-left">{{ user.name }}</td>
                    <td class="w-1/4 p-2 text-left">{{ user.email }}</td>
                    <td class="w-1/4 p-2">{{ getDate(user.created_at) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination links -->
        <div>
            <Pagination :paginator="users" />
        </div>
    </div>
</template>
