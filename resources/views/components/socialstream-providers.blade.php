<div class="flex items-center justify-center">
    @if (JoelButcher\Socialstream\Socialstream::hasGoogleSupport())
        <a href="{{ route('oauth.redirect', ['provider' => JoelButcher\Socialstream\Providers::google()]) }}">
            <div class="flex items-center justify-center">
                <x-google-icon class="h-6 w-6 mx-2"/>
                <span class="sr-only">Google</span>
                <span class="text-gray-600 text-xl">Sign in with Google</span>
            </div>
        </a>
    @endif
</div>
