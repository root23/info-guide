<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss xmlns:yandex="http://news.yandex.ru"
     xmlns:media="http://search.yahoo.com/mrss"
     xmlns:turbo="http://turbo.yandex.ru"
    version="2.0">
    <channel>
        <!-- Информация о сайте-источнике -->
        <title><![CDATA[{{ $meta['title'] }}]]></title>
        <link><![CDATA[{{ url($meta['link']) }}]]></link>
        <description><![CDATA[{{ $meta['description'] }}]]></description>
        <language>{{ $meta['language'] }}</language>
        <turbo:analytics></turbo:analytics>
        <turbo:adNetwork></turbo:adNetwork>

        @foreach($items as $item)
            <item turbo="true">
                <!-- Информация о странице -->
                <turbo:extendedHtml>true</turbo:extendedHtml>
                <link>{{ url($item->link) }}</link>
                <turbo:source></turbo:source>
                <turbo:topic></turbo:topic>
                <pubDate>{{ $item->updated->toRfc3339String() }}</pubDate>
                <author><![CDATA[{{ $item->author }}]]></author>
                <metrics>
                    <yandex schema_identifier="Идентификатор">
                        <breadcrumblist>
                            <breadcrumb url="https://info-guide.ru" text="Домашняя"/>
                            <breadcrumb url="https://info-guide.ru/cities" text="Города"/>
                            <breadcrumb url="{{ url($item->link) }}" text="{{ $item->title }}"/>
                        </breadcrumblist>
                    </yandex>
                </metrics>
                <yandex:related></yandex:related>
                <turbo:content>
                    <![CDATA[{!! $item->summary !!}]]>
                </turbo:content>
            </item>
    </channel>
</rss>
