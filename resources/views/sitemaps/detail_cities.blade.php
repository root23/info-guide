<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($cities as $city)
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/sto/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/medicina/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/restorany/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/sport/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/magaziny/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/kinoteatry/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
        <url>
            <loc>https://info-guide.ru/cities/{{ $city->slug }}/bary-i-kluby</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
    @endforeach
</urlset>
