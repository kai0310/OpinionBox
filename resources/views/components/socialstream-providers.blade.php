<div>

    @if (JoelButcher\Socialstream\Socialstream::hasGoogleSupport() && \Laravel\Fortify\Features::enabled(\Laravel\Fortify\Features::registration()))
        <div class="flex flex-row items-center justify-between py-4 text-gray-500">
            <hr class="w-full mr-2">
            {{ __('Or') }}
            <hr class="w-full ml-2">
        </div>
    @endif

    <div class="flex items-center justify-center">
        @if (JoelButcher\Socialstream\Socialstream::hasGoogleSupport())
            <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::google()]) }}">
                <div class="flex items-center justify-center">
                    <x-google-icon class="h-6 w-6 mx-2"/>
                    <span class="sr-only">Google</span>
                    <span class="text-gray-600 text-xl">Login with Google</span>
                </div>
            </a>
        @endif
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="text-xs mt-3">
            <a href="{{ route('terms.show') }}" class="underline" target="_blank">利用規約</a>
            、
            <a href="{{ route('policy.show') }}" class="underline" target="_blank">プライバシーポリシー</a>
            に同意した上でログインしてください。
        </div>
    @endif
</div>
