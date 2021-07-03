<div>
    <x-jet-form-section submit="submit">
        <x-slot name="title">意見をBoxに入れてみる</x-slot>
        <x-slot name="description">
            早速あなたもあなたの意見をBoxに入れてみましょう。<br/>
            Boxに入れるには次の項目にそれぞれ意見のタイトルと内容を入力し、送信するだけです。
        </x-slot>
        <div class="col-span-6 sm:col-span-4">
            <div class="max-w-xl ml-2 text-xs text-gray-600">
                どのような相談内容なのか分かりやすい様にタイトルをつけてください。
            </div>
            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="title" class="text-lg">タイトル</x-jet-label>
                    <div class="max-w-xl ml-2 text-xs text-gray-600 my-1">
                        それがどの様な提案・意見なのか分かりやすいようにタイトルを入力してください
                    </div>
                    <x-jet-input
                        wire:model.debounce.3s="title"
                        id="title"
                        class="block mt-1 w-full"
                        type="text"
                        name="title"
                        :value="old('title')"
                        required autofocus
                    />
                    <x-jet-input-error for="title" class="mt-2"/>

                    <x-jet-label class="text-lg mt-3" for="content">内容</x-jet-label>
                    <div class="max-w-xl ml-2 text-xs text-gray-600 my-1">
                        それがどの様な提案・意見なのか分かりやすいように簡潔に内容を入力してください
                    </div>
                    <textarea
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="10"
                        wire:model.debounce.5s="content"
                        id="content"
                    ></textarea>

                    <x-jet-input-error for="content" class="mt-2"/>
                </div>
            </x-slot>
            <x-slot name="actions">
                <x-jet-button submit type="submit">送信</x-jet-button>
            </x-slot>
        </div>
        <div class="col-span-6 sm:col-span-4">
            <div class="max-w-xl ml-2 text-xs text-gray-600">
                相談したい内容を分かりやすく文章で入力してください。
            </div>
        </div>
    </x-jet-form-section>
</div>
