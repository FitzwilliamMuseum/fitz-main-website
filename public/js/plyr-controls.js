// Change "{}" to your options:
// https://github.com/sampotts/plyr/#options
var controls =
[
    'restart', // Restart playback
    'play', // Play/pause playback
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'settings', // Settings menu
    'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
];
const player = new Plyr('#player', { controls });

// Expose player so it can be used from the console
window.player = player;
