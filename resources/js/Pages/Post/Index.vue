<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                相談する
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="my-4">
                    <div class="w-full mx-auto rounded-lg bg-white shadow p-5 text-gray-800" style="max-width: 750px">
                        相談方法は簡単下のリンクからフォームへ行き、投稿を作成するだけです。
                        <p class="text-xs text-gray-600 flex items-center text-right">
                            <inertia-link :href="route('post.create')">
                                <jet-button class="bg-blue-700 text-base">相談する</jet-button>
                            </inertia-link>
                        </p>
                    </div>
                </div>

                <div v-if="posts.length > 0">
                    <div class="my-4" v-for="post in posts" :key="post.id">
                        <div class="w-full mx-auto rounded-lg bg-white shadow p-5 text-gray-800" style="max-width: 750px">
                            <p class="text-xs text-gray-600 flex items-center text-right">
                                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z"/></svg>
                                他の生徒には見られません
                            </p>
                            <div class="w-full mb-4">
                                <h3>{{ post.title }}</h3>
                                <p class="text-sm">{{ post.body }}</p>
                            </div>
                            <div class="w-full">
                                <p class="text-xs text-gray-500 text-right">{{ post.created_at }}</p>
                            </div>
                            <hr>
                            <div class="text-xs text-gray-600 flex items-center text-right mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-500 w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                                <inertia-link :href="route('post.show', [post.id])">返信を確認する </inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="my-4 w-full mx-auto rounded-lg bg-white shadow p-5 text-gray-800 text-center" style="max-width: 750px">まだ投稿された質問はない様です</div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetButton from "@/Jetstream/Button";

export default {
    props: ['posts'],
    components: {
        AppLayout,
        JetButton,
    },
}
</script>
