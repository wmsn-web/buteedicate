<div class="container_vid show-controls">
        <div class="wrapper">
            <div class="video-timeline">
                <div class="progress-area">
                    <span>00:00</span>
                    <div class="progress-bar"></div>
                </div>
            </div>
            <ul class="video-controls">
                <li class="options left">
                    <button class="volume"><i class="fa-solid fa-volume-high"></i></button>
                    <input type="range" min="0" max="1" step="any">
                    <div class="video-timer">
                        <p class="current-time">00:00</p>
                        <p class="separator"> / </p>
                        <p class="video-duration">00:00</p>
                    </div>
                </li>
                <li class="options center">
                    <button class="skip-backward"><i class="fas fa-backward"></i></button>
                    <button class="play-pause"><i class="fas fa-play"></i></button>
                    <button class="skip-forward"><i class="fas fa-forward"></i></button>
                </li>
                <li class="options right">
                    <div class="playback-content">
                        <button class="playback-speed"><span class="material-symbols-rounded">slow_motion_video</span></button>
                        <ul class="speed-options">
                            <li data-speed="2">2x</li>
                            <li data-speed="1.5">1.5x</li>
                            <li data-speed="1" class="active">Normal</li>
                            <li data-speed="0.75">0.75x</li>
                            <li data-speed="0.5">0.5x</li>
                        </ul>
                    </div>
                    <button class="pic-in-pic"><span class="material-icons">picture_in_picture_alt</span></button>
                    <button class="fullscreen"><i class="fa-solid fa-expand"></i></button>
                </li>
            </ul>
        </div>
        <video src="<?= $main_vid['vid_file']; ?>"></video>
    </div>