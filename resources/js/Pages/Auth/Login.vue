<template>
    <Head title="Login" />

    <h1 class="w-2/4 mx-auto text-3xl text-center text-gray-800 font-bold mt-8 mb-4">Sign in</h1>

    <div class="w-2/4 mx-auto mt-8 bg-gray-100 p-4 rounded">
        <form action="" method="post">
            <div class="mb-4 flex flex-col">
                <label class="mb-2" for="email">Email</label>
                <input class="p-2 border rounded w-full" type="email" name="email" id="email" />
            </div>

            <div class="mb-4 flex flex-col">
                <label class="mb-2" for="password">Password</label>
                <input class="p-2 border rounded w-full" type="password" name="password" id="password" />
            </div>

            <button class="btn w-full mt-4 p-2 bg-gray-800 text-white rounded" type="submit">Login</button>
        </form>
    </div>
</template>
