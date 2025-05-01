<x-mail::message>
# Új ajánlat érkezett

Név: {{ $data['name'] }}<br>
Tel: {{ $data['tel'] }}<br>
Email: {{ $data['email'] }}<br>
Gyártmány: {{ $data['gyartmany'] }}<br>
Típus: {{ $data['tipus'] }}<br>
Km: {{ $data['km'] }}<br>
Állapot: {{ $data['allapot'] }}<br>
Évjárat: {{ $data['ev'] }}<br>
Irányár: {{ $data['ar'] }}<br>
Leírás: {{ $data['leiras'] }}<br>
Link: <a href="{{ $data['link'] }}" target="_blank">{{ $data['link'] }}</a>

<p style="text-align: center;">
    <a href="{{ $data['url'] }}" target="_blank" style="display: inline-block; text-align: center;">Bővebben</a>
</p>

</x-mail::message>
