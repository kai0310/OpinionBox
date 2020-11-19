<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
                ようこそ。OpinionBoxへ。
            </div>

            <div class="mt-6 text-gray-500">
                OpinionBoxでは、オンライン上で生徒と教師を結ぶことを目的としたプラットフォームです。
                例えば、なかなか声をかけられず相談のしにくいことや相談するタイミングが分からず、自分の意見や相談をすることが難しい生徒もいるかと思います。
                そこで、OpinionBoxを使用することにより、いつでも・どこから気軽に先生に相談することができ、教師と生徒の距離をもっと身近なものにします。
            </div>
        </div>

        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div class="mt-8 text-2xl">
                気軽に相談をしてみよう
            </div>

            <div class="mt-6 text-gray-500">
                さあ、OpinionBoxを使用してみましょう。相談方法は簡単下のリンクからフォームへ行き、投稿を作成するだけです。<br />
                <jet-button :href="route('')">
                    相談を投稿してみる
                </jet-button>
            </div>
        </div>
    </div>
</template>

<script>
import JetButton from './../Jetstream/Button'
export default {
    components: {
        JetButton,
    },
}
</script>
