const playButtons = document.querySelectorAll('.play-button');
const audios = [
    document.getElementById('audio-1'),
    document.getElementById('audio-2'),
    document.getElementById('audio-3'),
    document.getElementById('audio-4'),
    document.getElementById('audio-5'),
    document.getElementById('audio-6'),
    document.getElementById('audio-7'),
    document.getElementById('audio-8')

];
const progressBars = [
    document.getElementById('progress-bar-1'),
    document.getElementById('progress-bar-2'),
    document.getElementById('progress-bar-3'),
    document.getElementById('progress-bar-4'),
    document.getElementById('progress-bar-5'),
    document.getElementById('progress-bar-6'),
    document.getElementById('progress-bar-7'),
    document.getElementById('progress-bar-8')
];

playButtons.forEach((playbutton, index) => {
    playbutton.addEventListener('click', () => {
        if (audios[index].paused) {
            audios[index].play();
            playbutton.textContent = '❚❚';
        } else {
            audios[index].pause();
            playbutton.textContent = '▶';
        }
    });

    audios[index].addEventListener('timeupdate', () => {
        const progressPercentage = (audios[index].currentTime / audios[index].duration) * 100;
        progressBars[index].style.width = progressPercentage + '%';
    });

    audios[index].addEventListener('ended', () => {
        playbutton.textContent = '▶';
        progressBars[index].style.width = '0%';
    });
});
