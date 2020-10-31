<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach($organizations as $item)
        <url>
            <loc>https://info-guide.ru/kompanii/{{ $item->city->slug }}/{{ $item->category->slug }}/{{ $item->slug }}</loc>
            <lastmod>{{ $item->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </url>
    @endforeach
</urlset>
<?php
