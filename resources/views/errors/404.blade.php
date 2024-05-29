<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            text-align: center;
        }
        .container {
            margin-bottom: 20px;
        }
        canvas {
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Error 404 - Page Not Found</h1>
        <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
        <p>Silakan kembali ke <a href="/">halaman utama</a>.</p>
    </div>
    <canvas id="gameCanvas" width="800" height="200"></canvas>

    <script>
        const canvas = document.getElementById('gameCanvas');
        const ctx = canvas.getContext('2d');
        const dino = {
            x: 50,
            y: canvas.height - 50,
            width: 50,
            height: 50,
            jumping: false,
            velocityY: 0,
            gravity: 1
        };

        const obstacles = [];
        let score = 0;
        let gameSpeed = 5; // Initial game speed

        function drawDino() {
            ctx.fillStyle = '#333';
            ctx.fillRect(dino.x, dino.y, dino.width, dino.height);
        }

        function drawObstacles() {
            obstacles.forEach(obstacle => {
                if (obstacle.type === 'cactus') {
                    ctx.fillStyle = '#555';
                } else if (obstacle.type === 'bird') {
                    ctx.fillStyle = '#f00'; // Red color for bird
                }
                ctx.fillRect(obstacle.x, obstacle.y, obstacle.width, obstacle.height);
            });
        }

        function jump() {
            if (!dino.jumping) {
                dino.jumping = true;
                dino.velocityY = -20;
            }
        }

        function updateDino() {
            if (dino.jumping) {
                dino.y += dino.velocityY;
                dino.velocityY += dino.gravity;
                if (dino.y > canvas.height - dino.height) {
                    dino.y = canvas.height - dino.height;
                    dino.jumping = false;
                }
            }
        }

        function updateObstacles() {
            for (let i = obstacles.length - 1; i >= 0; i--) {
                obstacles[i].x -= gameSpeed;
                if (obstacles[i].x + obstacles[i].width < 0) {
                    obstacles.splice(i, 1);
                    score++; // Increase score when obstacle passes
                }
            }
        }

        function generateObstacle() {
            const random = Math.random();
            if (random < 0.5) { // 50% chance for cactus
                const obstacleHeight = Math.random() * 50 + 50; // Random height between 50 and 100
                const obstacleWidth = Math.random() * 20 + 20; // Random width between 20 and 40
                obstacles.push({
                    type: 'cactus',
                    x: canvas.width,
                    y: canvas.height - obstacleHeight,
                    width: obstacleWidth,
                    height: obstacleHeight
                });
            } else { // 50% chance for bird
                const birdHeight = 20;
                const birdWidth = 40;
                const birdY = Math.random() * (canvas.height - 150) + 50; // Random height between 50 and canvas.height - 100
                obstacles.push({
                    type: 'bird',
                    x: canvas.width,
                    y: birdY,
                    width: birdWidth,
                    height: birdHeight
                });
            }
        }

        function checkCollision() {
            for (let i = 0; i < obstacles.length; i++) {
                const obstacle = obstacles[i];
                if (dino.x < obstacle.x + obstacle.width &&
                    dino.x + dino.width > obstacle.x &&
                    dino.y < obstacle.y + obstacle.height &&
                    dino.y + dino.height > obstacle.y) {
                    return true;
                }
            }
            return false;
        }

        function gameLoop() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawDino();
            drawObstacles();
            updateDino();
            updateObstacles();

            ctx.fillStyle = '#000';
            ctx.font = '20px Arial';
            ctx.fillText('Score: ' + score, 20, 30);

            if (checkCollision()) {
                setTimeout(function() {
                    const restart = confirm('Game Over! Your Score: ' + score + '\nDo you want to play again?');
                    if (restart) {
                        obstacles.length = 0; // Clear obstacles
                        score = 0; // Reset score
                        gameSpeed = 5; // Reset game speed
                        gameLoop();
                    }
                }, 100);
            } else {
                requestAnimationFrame(gameLoop);
            }
        }

        document.addEventListener('keydown', function(event) {
            if (event.code === 'Space') {
                jump();
            }
        });

        setInterval(generateObstacle, 2000); // Generate obstacle every 2 seconds

        // Increase game speed over time
        setInterval(function() {
            gameSpeed += 0.5; // Increase game speed by 1 every second
        }, 1000); // Increase game speed every second

        gameLoop();
    </script>
</body>
</html>
