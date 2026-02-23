<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi OTP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #ffffff;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h3 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            text-align: center;
            letter-spacing: 3px;
        }

        input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #4CAF50;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .info {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>🔐 Verifikasi OTP</h3>

    <p class="info">
        Masukkan 6 digit kode OTP yang telah dikirim ke email Anda.
    </p>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <input 
            type="text" 
            name="otp" 
            maxlength="6"
            pattern="\d{6}"
            required
            placeholder="______"
        >

        <button type="submit">Verifikasi</button>
    </form>
</div>

</body>
</html>