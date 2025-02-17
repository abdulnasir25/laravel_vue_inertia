<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '../../Components/TextInput.vue';

const fileInput = ref(null);

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    preview: null
});

const change = (e) => {
    form.avatar = e.target.files[0];
    form.preview = URL.createObjectURL(e.target.files[0]);
}

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
            <div class="grid place-items-center">
                <div class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300 mx-auto">
                    <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
                        <span class="bg-white/70 pb-2 text-center">Avatar</span>
                    </label>
                    <input type="file" name="avatar" id="avatar" ref="fileInput" @input.change="change" hidden />

                    <img class="object-cover w-28 h-28" :src="form.preview ?? 'storage/avatars/default.jpeg'" alt="">
                </div>

                <p v-if="form.errors.avatar" class="text-red-500 text-xs mt-1">{{ form.errors.avatar }}</p>
            </div>

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
