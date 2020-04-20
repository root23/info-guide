<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($taxis as $taxi)
        <url>
            <loc>https://info-guide.ru/taxi/taxis/{{ $taxi->id }}/</loc>
            <lastmod>{{ $taxi->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
    @endforeach
</urlset>
<?php
