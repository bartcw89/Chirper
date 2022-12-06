<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Chirp from '@/Components/Chirp.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {useForm, Head} from '@inertiajs/inertia-vue3';

defineProps({
    chirps: Array
});

const form = useForm({
    message: '',
});
</script>

<template>
    <Head title="Chirps"/>

    <AuthenticatedLayout>
        <div class="p-4 mx-auto max-w-2xl sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                />
                <InputError :message="form.errors.message" class="mt-2"/>
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
            <div class="mt-6 bg-white rounded-lg divide-y shadow-sm">
                <Chirp
                    v-for="chirp in chirps"
                    :key="chirp.id"
                    :chirp="chirp"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
