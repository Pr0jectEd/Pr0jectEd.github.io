const playButtons = document.querySelectorAll('.play-button');
const loopButtons = document.querySelectorAll('.loop-button');
const audios = [
    document.getElementById('audio-1'),
    document.getElementById('audio-2'),
    document.getElementById('audio-3'),
    document.getElementById('audio-4')
];
const progressBars = [
    document.getElementById('progress-bar-1'),
    document.getElementById('progress-bar-2'),
    document.getElementById('progress-bar-3'),
    document.getElementById('progress-bar-4')
];
const progressContainers = [
    document.getElementById('progress-1'),
    document.getElementById('progress-2'),
    document.getElementById('progress-3'),
    document.getElementById('progress-4')
];

playButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        if (audios[index].paused) {
            audios[index].play();
            button.textContent = '❚❚';
        } else {
            audios[index].pause();
            button.textContent = '▶';
        }
    });

    audios[index].addEventListener('timeupdate', () => {
        const progressPercentage = (audios[index].currentTime / audios[index].duration) * 100;
        progressBars[index].style.width = progressPercentage + '%';
    });

    audios[index].addEventListener('ended', () => {
        button.textContent = '▶';
        progressBars[index].style.width = '0%';
    });

    progressContainers[index].addEventListener('click', (e) => {
        const progressWidth = progressContainers[index].clientWidth;
        const clickX = e.offsetX;
        const duration = audios[index].duration;
        audios[index].currentTime = (clickX / progressWidth) * duration;
    });
});

loopButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        if (audios[index].loop) {
            audios[index].loop = false;
            button.classList.remove('active');
        } else {
            audios[index].loop = true;
            button.classList.add('active');
        }
    });
});
