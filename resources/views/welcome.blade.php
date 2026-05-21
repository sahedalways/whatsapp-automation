<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>WhatsApp Automation | Sk Sahed Ahmed</title>

    @fonts

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
        }

        body {
            background: radial-gradient(circle at top, #0f172a, #020617);
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 52px;
            font-weight: 800;
            background: linear-gradient(90deg, #22c55e, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 25px;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .name {
            font-size: 24px;
            font-weight: bold;
            color: #22c55e;
            margin-top: 10px;
        }

        .role {
            font-size: 14px;
            color: #94a3b8;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: #22c55e;
            color: #0f172a;
        }

        .btn-primary:hover {
            background: #16a34a;
        }

        .btn-secondary {
            background: #1e293b;
            color: #e2e8f0;
            border: 1px solid #334155;
        }

        .btn-secondary:hover {
            background: #334155;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #64748b;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 34px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>WhatsApp AI Automation System</h1>

        <p>
            Build smart WhatsApp automation for your business — auto replies, lead capture,
            appointment booking, and AI-powered customer support.
        </p>

        <div class="card">
            <h2>Created by</h2>
            <div class="name">Sk Sahed Ahmed</div>
            <div class="role">Software Engineer | Laravel • Next.js • Automation Expert</div>
        </div>

        <div class="buttons">
            <a href="#"
               class="btn btn-primary">Get Started</a>
            <a href="#"
               class="btn btn-secondary">View Demo</a>
        </div>

        <div class="footer">
            AI-powered WhatsApp automation for modern businesses in Bangladesh & beyond.
        </div>

    </div>

</body>

</html>
