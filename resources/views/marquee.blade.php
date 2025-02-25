<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Letreiro em Loop</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        .marquee {
            position: absolute;
            white-space: nowrap;
            overflow: hidden;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
        }

        .marquee span {
            display: inline-block;
            padding-left: 100%;
            font-weight: bold;
            animation: marquee 30s linear infinite;
        }

        .settings-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .settings-button:hover {
            transform: rotate(45deg);
            background: rgba(255, 255, 255, 0.2);
        }

        @keyframes marquee {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-100%, 0); }
        }
    </style>
</head>
<body x-data="marqueeSettings" :style="{ backgroundColor: backgroundColor }">
    <div>
        <div class="marquee">
            <span x-text="displayText" :style="{
                fontSize: fontSize + 'px',
                background: currentGradient,
                '-webkit-background-clip': 'text',
                '-webkit-text-fill-color': 'transparent',
                'background-size': '200% auto',
                'animation': `marquee ${animationSpeed}s linear infinite, gradient 5s ease infinite`
            }"></span>
        </div>

        <button
            class="settings-button"
            @click="isOpen = true"
        >
            <i class="fas fa-cog"></i>
        </button>

        @include('components.settings-modal')
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('marqueeSettings', () => ({
                isOpen: false,
                displayText: 'Este é um texto muito grande passando como um letreiro em loop infinito.',
                fontSize: 48,
                animationSpeed: 30,
                currentGradient: 'linear-gradient(to right, #ff00ff, #00ffff, #ff00ff)',
                backgroundColor: '#000000',
                gradients: [
                    'linear-gradient(to right, #ff00ff, #00ffff, #ff00ff)',
                    'linear-gradient(to right, #00ff00, #0000ff, #00ff00)',
                    'linear-gradient(to right, #ff0000, #ffff00, #ff0000)',
                    'linear-gradient(to right, #00ffff, #ff00ff, #00ffff)',
                    'linear-gradient(to right, #ff00ff, #ff0000, #ff00ff)',
                    'linear-gradient(45deg, #ff6b6b, #feca57)',
                    'linear-gradient(45deg, #4834d4, #686de0)',
                    'linear-gradient(45deg, #ff9ff3, #feca57)',
                    'linear-gradient(45deg, #00d2d3, #2e86de)',
                    'linear-gradient(45deg, #ff4757, #ff6b6b)'
                ],
                backgroundColors: [
                    '#000000', '#FFFFFF', '#FF0000', '#00FF00', '#0000FF',
                    '#FFFF00', '#00FFFF', '#FF00FF', '#808080', '#800000'
                ],

                setGradient(gradient) {
                    this.currentGradient = gradient;
                },

                setBackgroundColor(color) {
                    this.backgroundColor = color;
                },

                saveChanges() {
                    // Aqui você pode adicionar lógica para salvar as configurações
                    this.isOpen = false;
                }
            }))
        })
    </script>
</body>
</html>
