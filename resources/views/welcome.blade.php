<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Video Player</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        video::-webkit-media-controls-enclosure {
            overflow: hidden;
        }
        video::-webkit-media-controls-download-button {
            display: none;
        }
        video::-webkit-media-controls-playback-rate-button {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Secure Video Player</h1>
        <div class="video-player mt-4 text-center">
            <video id="videoPlayer" class="w-100" controls>
                <source src="" type="video/mp4">
                Sizning brauzeringiz videolarni qo'llab-quvvatlamaydi.
            </video>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '/generate-video-url/01',
                method: 'GET',
                success: function (response) {
                    $('#videoPlayer source').attr('src', response.url);
                    $('#videoPlayer')[0].load();
                },
                error: function () {
                    alert('Videoni yuklab bo\'lmadi.');
                }
            });
            const videoPlayer = document.getElementById('videoPlayer');
            videoPlayer.addEventListener('play', function () {
                console.log('Video ijro etilmoqda');
            });
            videoPlayer.addEventListener('pause', function () {
                console.log('Video pauza qilindi');
            });
        });
    </script>
</body>
</html>
