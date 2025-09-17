<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 300;
        }
        .content {
            padding: 40px 30px;
        }
        .field {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .field-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .field-value {
            color: #555;
            font-size: 16px;
            word-wrap: break-word;
        }
        .message-field {
            background-color: #e8f4fd;
            border-left-color: #007bff;
        }
        .message-field .field-value {
            white-space: pre-line;
            line-height: 1.8;
        }
        .source-info {
            background-color: #e8f5e8;
            border: 1px solid #d4edda;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
        }
        .source-info strong {
            color: #155724;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }
        .footer p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        .company-logo {
            display: inline-block;
            background-color: rgba(255,255,255,0.2);
            padding: 10px 20px;
            border-radius: 50px;
            margin-bottom: 10px;
        }
        @media (max-width: 600px) {
            .container {
                margin: 10px;
                border-radius: 5px;
            }
            .content {
                padding: 20px 15px;
            }
            .header {
                padding: 20px 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="company-logo">
                <strong>IXXI TECNOLOGÍA</strong>
            </div>
            <h1>Nuevo Mensaje de Contacto</h1>
        </div>

        <div class="content">
            <div class="source-info">
                <strong>Origen:</strong> {{ ucfirst($source) }}
            </div>

            <div class="field">
                <div class="field-label">👤 Nombre Completo</div>
                <div class="field-value">{{ $customerName }}</div>
            </div>

            @if($customerEmail)
            <div class="field">
                <div class="field-label">📧 Correo Electrónico</div>
                <div class="field-value">
                    <a href="mailto:{{ $customerEmail }}" style="color: #667eea; text-decoration: none;">
                        {{ $customerEmail }}
                    </a>
                </div>
            </div>
            @endif

            @if($customerPhone)
            <div class="field">
                <div class="field-label">📞 Teléfono</div>
                <div class="field-value">
                    <a href="tel:{{ $customerPhone }}" style="color: #667eea; text-decoration: none;">
                        {{ $customerPhone }}
                    </a>
                </div>
            </div>
            @endif

            @if($customerMessage)
            <div class="field message-field">
                <div class="field-label">💬 Mensaje</div>
                <div class="field-value">{{ $customerMessage }}</div>
            </div>
            @endif

            <div style="margin-top: 30px; padding: 20px; background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 8px;">
                <p style="margin: 0; color: #856404; font-weight: 500;">
                    ⚡ <strong>Acción requerida:</strong> Responder a este cliente lo antes posible para mantener un excelente servicio.
                </p>
            </div>
        </div>

        <div class="footer">
            <p>Este mensaje fue enviado desde el formulario de contacto de <strong>IXXI Tecnología</strong></p>
            <p style="margin-top: 10px; font-size: 12px; color: #999;">
                Fecha: {{ date('d/m/Y H:i:s') }}
            </p>
        </div>
    </div>
</body>
</html>
