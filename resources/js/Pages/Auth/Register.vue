<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';

const fileInput = ref(null);

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null
});

const submit = () => {
    console.log(form);

    form.post(route('register.attempt'), {
        preserveScroll: true,
        onError: (errors) => {
            console.log(errors);
            form.reset('password', 'password_confirmation');
        }
    });
}
</script>
<template>
    <Head title="Register" />

    <h1 class="w-2/4 mx-auto text-3xl text-center text-gray-800 font-bold mt-8 mb-4">Register a new account</h1>

    <div class="w-2/4 mx-auto mt-8 bg-gray-100 p-4 rounded">
        <form @submit.prevent="submit">
            <TextInput name="name" v-model="form.name" :message="form.errors.name" />

            <TextInput type="email" name="email" v-model="form.email" :message="form.errors.email" />

            <TextInput type="password" name="password" v-model="form.password" :message="form.errors.password" />

            <TextInput type="password" name="password_confirmation" v-model="form.password_confirmation" />

            <div class="my-4 flex flex-col text-gray-800">
                <p>Already have an account? <Link class="underline" :href="route('login')">Login</Link></p>
            </div>

            <!-- and disable button if form is processing -->
            <button class="btn w-full mt-4 p-2 bg-gray-800 text-white rounded disabled:bg-gray-400" type="submit" :disabled="form.processing">Register</button>
        </form>
    </div>
</template>
