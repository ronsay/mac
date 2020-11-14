<?php print '<?xml version="1.0" encoding="UTF-8" ?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
@foreach($galleries as $gallery)
    <url>
        <loc>{{ url('/realisations') }}/{{$gallery->url ?? ''}}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
@endforeach
    <url>
        <loc>{{ url('/a-propos') }}</loc>
        <changefreq>yearly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('/contact') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
</urlset>