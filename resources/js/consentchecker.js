window.addEventListener('DOMContentLoaded', () => {
    let soundcloudEmbeds = document.querySelectorAll('.soundcloud-embed-component');
    let cc = initCookieConsent();

    if(soundcloudEmbeds && soundcloudEmbeds.length > 0) {

        soundcloudEmbeds.forEach(embed => {

            let embedContainer = embed.querySelector('.container');
            let iframeEl = embed.querySelector('iframe');
            const iframeSrc = iframeEl.getAttribute('src');
            
            if(cc) {
                const preferences = cc.getUserPreferences();
                if(preferences.acceptType == 'all') {
                    // Remove any classes blocking interaction
                    if(embed.classList.contains('cookies-rejected')) {
                        embed.classList.remove('cookiesRejected');
                        if(embedContainer.querySelector('.cookies-rejected__message')) {
                            let cookiesMessage = embedContainer.querySelector('.cookies-rejected__message');
                            embedContainer.removeChild(cookiesMessage);
                        }
                        if(iframeEl.getAttribute('src') == '') {
                            iframeEl.setAttribute('src', iframeSrc);
                        }
                    }
                } else {
                    iframeEl.setAttribute('src', '');
                    embed.classList.add('cookies-rejected')
                    let cookiesText = document.createElement('p');
                    cookiesText.classList.add('cookies-rejected__message');
                    cookiesText.innerHTML = 'You must accept analytics cookies to view this media';
                    embedContainer.appendChild(cookiesText);
                }
            }

        })
    }
});
