<!DOCTYPE html>
<html>
<head>
<style>
@page { margin: 0.5cm; }
body { font-family: sans-serif; }

table {
    width: 100%;
    border-collapse: separate;  /* Ganti dari collapse ke separate */
    border-spacing: 0.3cm;      /* Jarak antar kotak */
    table-layout: fixed;
}

td {
    width: 3.8cm;
    height: 1.8cm;
    border: 0.5px solid #000;
    text-align: center;
    vertical-align: middle;
    font-size: 10px;
    padding: 0.2cm;             /* Jarak dalam kotak (dari border ke teks) */
    box-sizing: border-box;     /* Agar padding tidak menambah ukuran */
}
</style>
</head>
<body>

<table>
@for ($row = 0; $row < 8; $row++)
    <tr>
        @for ($col = 0; $col < 5; $col++)
            @php
                $index = ($row * 5) + $col;
                $b = $labels[$index] ?? null;
            @endphp

            <td>
                @if($b)
                    {{ $b->id_barang }} <br>
                    {{ $b->nama_barang }} <br>
                    Rp {{ number_format($b->harga, 0, ',', '.') }}
                @endif
            </td>
        @endfor
    </tr>
@endfor
</table>

</body>
</html>