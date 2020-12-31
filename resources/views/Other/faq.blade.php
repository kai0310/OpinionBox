<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            FAQ
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <section class="text-gray-700">
            <div class="container px-5 py-20 mx-auto">
                <div class="text-center mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">
                        よくある質問
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                        お困りですか？OpinionBoxについてのよくある質問は以下に記載しています。それでも解決しない場合は、<a href="https://github.com/kai0310/OpinionBox/issues" target="_blank">Support</a>を利用してください。
                    </p>
                </div>
                <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <div class="w-full lg:w-1/2 px-4 py-2">
                        <details class="mb-4">
                            <summary class="bg-gray-200 rounded-md py-2 px-4 cursor-pointer select-none">
                                投稿内容は他の人に見られますか？
                            </summary>
                            <span>はい。投稿内容は承認された投稿のみ公開されます。承認は権限を持っている一部のユーザのみが行うことができます。<br />詳細は<a href="{{ route('guide') }}" class="text-blue-500">Guide</a>をご参照ください。</span>
                        </details>
                        <details class="mb-4">
                            <summary class="bg-gray-200 rounded-md py-2 px-4 cursor-pointer select-none">
                                どの様にして投稿することができますか？
                            </summary>
                            <span>OpinionBoxの利用方法については<a href="route('Guide')">ガイド</a>に記載されていますので、ご活用ください。</span>
                        </details>
                        <details class="mb-4">
                            <summary class="bg-gray-200 rounded-md py-2 px-4 cursor-pointer select-none">
                                システムの修正の報告について
                            </summary>
                            <span>
                                  OpinionBoxにおいて修正の必要なバグ等はこのサイトの運営者もしくは<a href="https://github.com/kai0310/OpinionBox/issues" target="_blank">GitHubでissues</a>を作成し、開発者に知らせてください。
                                </span>
                        </details>
                    </div>
                    <div class="w-full lg:w-1/2 px-4 py-2">
                        <details class="mb-4">
                            <summary class="bg-gray-200 rounded-md py-2 px-4 cursor-pointer select-none">
                                推奨していない投稿
                            </summary>
                            <span class="px-4 py-2">
                                    OpinionBoxでは以下の内容を推奨していない投稿と定め、該当している可能性がある場合は削除される可能性があります。
                                    <ul class="list-disc list-inside ml-3">
                                        <li>出会いを目的にした投稿</li>
                                        <li>他者の権利や名誉、プライバシーを損害する投稿</li>
                                        <li>他者を誹謗中傷する投稿</li>
                                        <li>犯罪行為に結びつく、あるいは助長する投稿</li>
                                        <li>法令や公序良俗に反する投稿</li>
                                        <li>ユーザーの敵対心をいたずらに煽るような投稿</li>
                                        <li>営利を目的とした投稿や宣伝行為</li>
                                        <li>その他のサイトのサービスを妨げる投稿</li>
                                        <li>サイト運営者が不適切と判断した投稿</li>
                                    </ul>
                                </span>
                        </details>
                        <details class="mb-4">
                            <summary class="bg-gray-200 rounded-md py-2 px-4 cursor-pointer select-none">
                                退会・アカウント削除したい
                            </summary>
                            <span class="px-4 py-2">
                                  退会・アカウント削除はご自身のアカウントよりプロフィールページにてアカウント削除の項目がありますので、そちらを削除することにより完全に削除されます。
                                </span>
                        </details>
                        <details class="mb-4">
                            <summary class="bg-gray-200 rounded-md py-2 px-4 cursor-pointer select-none">
                                サポート環境について
                            </summary>
                            <span class="px-4 py-2">
                                    OpinionBoxのサポート環境は以下の通りです。また、当サイトではJavaScriptを使用しております。JavaScriptを無効にして使用された場合、各ページが正常に動作しない、または、表示されない場合がございます。
                                  <ul class="list-disc list-inside ml-3">
                                        <li>Google Chrome 最新バージョン</li>
                                        <li>Firefox 最新バージョン</li>
                                        <li>Safari 最新バージョン</li>
                                        <li>FireFox 最新バージョン</li>
                                    </ul>
                                </span>
                        </details>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
