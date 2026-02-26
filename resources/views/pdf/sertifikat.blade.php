<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            text-align: center;
            padding: 40px;
            border: 15px solid #2E86C1;
        }

        .title {
            font-size: 50px;
            color: #2E86C1;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 20px;
            color: #555;
        }

        .name {
            font-size: 42px;
            margin: 25px 0;
            color: #1B4F72;
            font-weight: bold;
            border-bottom: 2px solid #2E86C1;
            display: inline-block;
            padding: 10px 20px;
        }

        .event {
            font-size: 26px;
            color: #117A65;
            margin-top: 15px;
        }

        .footer {
            margin-top: 60px;
            font-size: 16px;
        }

        .signature {
            margin-top: 40px;
        }

        .line {
            width: 200px;
            margin: auto;
            border-top: 2px solid black;
        }
    </style>
</head>
<body>

    <div class="title">SERTIFIKAT</div>
    <div class="subtitle">Diberikan Kepada</div>

    <div class="name">
        {{ Auth::user()->name }}
    </div>

    <div class="subtitle">
        Atas Partisipasinya Dalam
    </div>

    <div class="event">
        Pelatihan Laravel & Google Authentication
    </div>

    <div class="footer">
        Tanggal: {{ date('d F Y') }}
    </div>

    <div class="signature">
        <div class="line"></div>
        <p>Ketua Panitia</p>
    </div>

</body>
</html>