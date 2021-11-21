<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mx-auto pt-5 md:flex justify-center items-center text-center">
        <div>
            <div class="hidden sm:block">
                <x-jet-application-logo class="hidden"/>
            </div>
            <h3 class="text-2xl py-5">
                一人の意見から。大きな影響を。
            </h3>
        </div>
        <img
            src="{{ asset('/icons/share.svg') }}"
            class="mx-auto md:m-0" width="256"
            height="256"
            onmousedown="return false;"
        />
    </div>
    <div class="p-6 mt-6 text-gray-500">
        OpinionBoxは、オンライン上で生徒の意見を取り入れ、更なる学校生活の改善へと繋げていく
        <a href="{{ config('opinion-box.github.license') }}" class="text-blue-500">
            Apache-2.0 License
        </a>
        の下に提供されているプラットフォームです。<br/>
        例えば、生徒の「もっとこうして欲しい！」といった改善や「このようなものが必要だ！」などといった要望もOpinionBoxを用いて投稿することが可能です。
    </div>

    <hr>

    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-8 text-2xl">
            気軽に意見を投稿しよう
        </div>
        <div class="mt-6 text-gray-500">
            さあ、OpinionBoxを使用してみましょう。<br/>
            Boxに意見を入れる方法は簡単です。以下のリンクよりフォームに意見を入力し送信するだけです。<br/>
            <a href="{{ route('post.create') }}" class="inline-flex px-4 py-2 mt-3 bg-gray-800 border border-transparent rounded-md text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Boxに意見を入れる
            </a>
        </div>
    </div>

    <div class="p-6 sm:px-20 bg-white border-gray-200">
        <div class="mt-8 text-2xl">
            開発に参加しよう！
        </div>
        <div class="mt-6 text-gray-500">
            OpinionBoxでは開発チームを募集しています。
            <a href="{{ config('opinion-box.github.discussions') }}" class="text-blue-500" target="_blank">
                GitHubのdiscussions
            </a>
            より参加の意思表示を行ってください。<br/>
            私たちはみなさんがコントリビュータとしてまた会えることを心待ちにしています。
        </div>
    </div>
</div>
