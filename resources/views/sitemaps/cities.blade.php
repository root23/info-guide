<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($cities as $city)
        <url>
            <loc>https://info-guide.ru/taxi/cities/{{ $city->slug }}/</loc>
            <lastmod>{{ $city->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
    @endforeach
</urlset>
