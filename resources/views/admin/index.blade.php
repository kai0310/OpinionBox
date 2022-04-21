<x-admin-layout>
    <x-slot name="header">
        ホーム
    </x-slot>

    <div>
        <div class="mt-6 bg-white dark:bg-secondary-800 rounded-lg shadow-lg p-4 sm:p-5">
            <div class="z-20 relative grid gap-4 sm:gap-x-6 sm:gap-y-4 sm:grid-cols-3">
                <a href="http://127.0.0.1:8000/shopper/setting/general" class="p-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-50 dark:hover:bg-secondary-700 transition ease-in-out duration-200">
                    <div class="shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                        <x-heroicon-o-speakerphone class="h-6 w-6" />

                    </div>
                    <div class="space-y-1">
                        <p class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                            {{ __('お知らせ管理') }}
                        </p>
                        <p class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            {{ __('アプリケーションから発信されるお知らせを管理します') }}
                        </p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/shopper/setting/management" class="p-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-50 dark:hover:bg-secondary-700 transition ease-in-out duration-200">
                    <div class="shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                        <x-heroicon-o-user-group class="w-6 h-6" />
                    </div>
                    <div class="space-y-1">
                        <p class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                            {{ __('ユーザ管理') }}
                        </p>
                        <p class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            {{ __('ユーザの情報管理やペナルティを与えるなどを行います') }}
                        </p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/shopper/setting/email-setting" class="p-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-50 dark:hover:bg-secondary-700 transition ease-in-out duration-200">
                    <div class="shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                        <x-heroicon-o-key class="w-6 h-6" />
                    </div>
                    <div class="space-y-1">
                        <p class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                            {{ __('権限管理') }}
                        </p>
                        <p class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            {{ __('ユーザに付与する権限を管理します') }}
                        </p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/shopper/setting/email-setting" class="p-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-50 dark:hover:bg-secondary-700 transition ease-in-out duration-200">
                    <div class="shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                        <x-heroicon-o-shield-check class="w-6 h-6" />
                    </div>
                    <div class="space-y-1">
                        <p class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                            {{ __('ロール設定') }}
                        </p>
                        <p class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            {{ __('ユーザに付与するロールを管理します') }}
                        </p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/shopper/setting/email-setting" class="p-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-50 dark:hover:bg-secondary-700 transition ease-in-out duration-200">
                    <div class="shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                        <x-heroicon-o-pencil-alt class="w-6 h-6" />
                    </div>
                    <div class="space-y-1">
                        <p class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                            {{ __('投稿管理') }}
                        </p>
                        <p class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            {{ __('ユーザに投稿した内容を管理します') }}
                        </p>
                    </div>
                </a>
                <a href="http://127.0.0.1:8000/shopper/setting/email-setting" class="p-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-50 dark:hover:bg-secondary-700 transition ease-in-out duration-200">
                    <div class="shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                        <x-heroicon-o-puzzle class="w-6 h-6" />
                    </div>
                    <div class="space-y-1">
                        <p class="text-base leading-6 font-medium text-secondary-900 dark:text-white">
                            {{ __('アプリケーション設定') }}
                        </p>
                        <p class="text-sm leading-5 text-secondary-500 dark:text-secondary-400">
                            {{ __('アプリケーション全般に関する設定を行います') }}
                        </p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</x-admin-layout>
