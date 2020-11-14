{
    "name": "MAC Onsay",
    "short_name": "MAC",
    "description": "MAC (Maquette d'Architecture Créations), entreprise spécialisée dans la réalisation de maquette d'architecture et urbanisme.",
    "lang": "fr",
    "icons": [
    @foreach($icons as $icon)
        {
          "src": "{{ url('/') }}/img/icons/icon-{{ $icon }}.png",
          "type": "image/png",
          "sizes": "{{ $icon }}x{{ $icon }}"
        }@if(!$loop->last),@endif
    @endforeach
    ],
    "start_url": "{{ url('/') }}",
    "display": "standalone",
    "orientation": "portrait-primary",
    "background_color": "#fff",
    "theme_color": "#fff"
}