<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';

const fileInput = ref(null);

const form = useForm({
    email: null,
    password: null,
    remember: false
});

const submit = () => {
    console.log(form);

    form.post(route('login.attempt'), {
        preserveScroll: true,
        onError: (errors) => {
            console.log(errors);
            form.reset('password');
        }
    });
}
</script>
<template>
    <Head title="Login" />

    <h1 class="w-2/4 mx-auto text-3xl text-center text-gray-800 font-bold mt-8 mb-4">Login to your account</h1>

    <div class="w-2/4 mx-auto mt-8 bg-gray-100 p-4 rounded">
        <form @submit.prevent="submit">
            <TextInput type="email" name="email" v-model="form.email" :message="form.errors.email" />
            <TextInput type="password" name="password" v-model="form.password" :message="form.errors.password" />

            <div class="my-6 flex flex-center justify-between">
                <div class="flex items-center">
                    <label>Remember me? <input type="checkbox" name="remember" id="remember" v-model="form.remember"></label>
                </div>

                <p>Need an account? <Link class="underline" :href="route('register')">Register</Link></p>
            </div>

            <!-- and disable button if form is processing -->
            <button class="btn w-full mt-4 p-2 bg-gray-800 text-white rounded disabled:bg-gray-400" type="submit" :disabled="form.processing">Login</button>
        </form>
    </div>
</template>
