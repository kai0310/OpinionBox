<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                相談する
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-form-section @submitted="createPost">
                    <template #title>相談してみる</template>
                    <template #description>このページからフォームに内容を入力して、相談内容を送信することができます。また、相談内容は他の生徒に見られることはありません。</template>
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="タイトル" />
                            <div class="max-w-xl ml-2 text-xs text-gray-600">
                                どのような相談内容なのか分かりやすい様にタイトルをつけてください。
                            </div>
                            <jet-input
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                            />
                            <jet-input-error
                                :message="form.error('title')"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="body" value="相談内容" />
                            <div class="max-w-xl ml-2 text-xs text-gray-600">
                                相談したい内容を分かりやすく文章で入力してください。
                            </div>
                            <textarea v-model="form.body" class="mt-1 block w-full form-input rounded-md shadow-sm"></textarea>
                            <jet-input-error
                                :message="form.error('body')"
                                class="mt-2"
                            />
                        </div>
                    </template>
                    <template #actions>
                        <jet-button
                            class="bg-blue-700"
                        >
                            投稿
                        </jet-button>
                    </template>
                </jet-form-section>
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
    props:['posts'],
    components: {
        AppLayout,
        JetFormSection,
        JetInput,
        JetLabel,
        JetButton,
        JetInputError,
    },
    data() {
        return {
            form: this.$inertia.form(
                {
                    _method: "POST",
                    title: "",
                    body: "",
                },
                {
                    bag: "postCreate",
                    resetOnSuccess: false,
                }
            )
        };
    },
    methods:{
        createPost(){
            this.form.post(route('post.store'));
        }
    }
}
</script>
