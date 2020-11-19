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
                        <div class="mt-8 text-2xl">{{ post.title }}</div>
                        <div class="mt-6 text-gray-500">{{ post.body }}</div>
                    </div>
                </div>
            </div>
            <ul v-for="comment in comments" :key="comment.id">
                <li>{{ comment.body }}</li>
            </ul>
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
    props: {
        post: {
            type: Array,
        },
        comments: {
            type: Array,
        },
    },
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
