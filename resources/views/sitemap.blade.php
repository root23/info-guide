<?= '<'.'?'.'xml version="1.0" encoding="UTF-8"?>'."\n"; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>https://info-guide.ru/sitemaps/main.xml</loc>
        <lastmod>2020-04-19</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://info-guide.ru/sitemaps/cities.xml</loc>
        <lastmod>2020-04-19</lastmod>
    </sitemap>
    <sitemap>
        <loc>https://info-guide.ru/sitemaps/posts.xml</loc>
        <lastmod>{{ $blog_posts->updated_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    @for($i = 0; $i <= 12; $i++)
        <sitemap>
            <loc>https://info-guide.ru/sitemaps/taxis{{ $i }}.xml</loc>
            <lastmod>{{ $taxi->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endfor
    @for ($i = 0; $i <=1; $i++)
        <sitemap>
            <loc>https://info-guide.ru/sitemaps/organizations{{ $i }}.xml</loc>
            <lastmod>{{ $organization->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        </sitemap>
    @endfor

</sitemapindex>
