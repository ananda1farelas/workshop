<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            border: 10px solid #000;
            padding: 50px;
        }

        h1 {
            font-size: 50px;
            margin-bottom: 0;
        }

        h2 {
            font-size: 30px;
        }

        .name {
            font-size: 40px;
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>SERTIFIKAT</h1>
    <p>Diberikan kepada:</p>

    <div class="name">
        Ananda Farel
    </div>

    <p>Atas partisipasinya dalam kegiatan</p>

    <h2>Pelatihan Laravel & Google Login</h2>

    <br><br>

    <p>Tanggal: {{ date('d M Y') }}</p>

</body>
</html>