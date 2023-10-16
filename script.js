document.addEventListener('DOMContentLoaded', function () {
    const videoPlayer = document.getElementById('videoPlayer');
    const playlistItems = document.querySelectorAll('.playlist-items li');
    var backsound = document.getElementById('backsound');
    backsound.play();
    
    let currentIndex = 0;

    function playVideo(index) {
        const videoSource = playlistItems[index].getAttribute('data-src');
        videoPlayer.src = videoSource;
        videoPlayer.load();
        videoPlayer.play();
    }

    setInterval(function () {
        playVideo(currentIndex);
        currentIndex = (currentIndex + 1) % playlistItems.length;
    }, 13300); // Ganti 5000 dengan jumlah milidetik yang diinginkan antara perpindahan video

});
