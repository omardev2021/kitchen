<div >
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @php
                // Determine if we should display this language based on current language
                $currentLocaleCode = LaravelLocalization::getCurrentLocale();
                $showLink = ($currentLocaleCode == 'ar' && $localeCode == 'en') || ($currentLocaleCode == 'en' && $localeCode == 'ar');
            @endphp

            @if($showLink)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
