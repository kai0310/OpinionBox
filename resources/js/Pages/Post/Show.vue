<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                相談する
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-8 text-2xl">{{ posts.title }}</div>
                        <div class="mt-6 text-gray-500">{{ posts.body }}</div>
                    </div>
                </div>
            </div>
            <div v-for="comment in posts.comments" :key="comment.id"
                 class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto mt-5 max-w-md md:max-w-2xl ">
                <div class="flex items-start px-4 py-6">
                    <img class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                         :src="comment.user.profile_photo_url"
                         alt="avatar">
                    <div class="">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ comment.user.name }}</h2>
                            <small class="text-sm text-gray-700">{{ comment.created_at }}</small>
                        </div>
                        <p class="mt-3 text-gray-700 text-sm">
                            {{ comment.body }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetInputError from "@/Jetstream/InputError";

export default {
    props: ['posts'],
    components: {
        AppLayout,
        JetFormSection,
        JetInput,
        JetLabel,
        JetButton,
        JetInputError,
    },
    methods: {
        createPost() {
            this.form.post(route('post.store'));
        }
    }
}
</script>
