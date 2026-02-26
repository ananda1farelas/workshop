<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            padding: 40px;
        }

        .header {
            text-align: center;
            background-color: #2E86C1;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }

        .header h2 {
            margin: 0;
        }

        .content {
            margin-top: 30px;
            line-height: 1.8;
            font-size: 16px;
        }

        .highlight {
            color: #117A65;
            font-weight: bold;
        }

        .box {
            background: #EBF5FB;
            padding: 15px;
            border-left: 5px solid #2E86C1;
            margin: 20px 0;
        }

        .footer {
            margin-top: 60px;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>FAKULTAS TEKNOLOGI INFORMASI</h2>
        <p>Universitas Airlangga</p>
    </div>

    <div class="content">

        <p>Kepada Yth,</p>
        <p><span class="highlight">{{ Auth::user()->name }}</span></p>

        <p>
            Dengan hormat, kami mengundang Saudara/i untuk menghadiri kegiatan seminar:
        </p>

        <div class="box">
            <p><strong>Hari/Tanggal:</strong> Senin, 25 Februari 2026</p>
            <p><strong>Waktu:</strong> 09.00 WIB</p>
            <p><strong>Tempat:</strong> Aula Utama Kampus</p>
        </div>

        <p>
            Demikian undangan ini kami sampaikan. Atas perhatian dan kehadirannya,
            kami ucapkan terima kasih.
        </p>

    </div>

    <div class="footer">
        <p>Hormat Kami,</p>
        <br>
        <p><strong>Dekan FTI</strong></p>
    </div>

</body>
</html>