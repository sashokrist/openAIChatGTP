<div class="flex justify-center pt-8 sm:justify-start sm:pt-0" style="color: white">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span>
        @else
            <!-- Generate language switch URL and append returnUrl as a query string -->
            <a class="ml-1 underline ml-2 mr-2" href="{{ route('language.switch', ['locale' => $available_locale]) }}?returnUrl={{ urlencode(url()->full()) }}">
                <span>{{ $locale_name }}</span>
            </a>
        @endif
    @endforeach
</div>
