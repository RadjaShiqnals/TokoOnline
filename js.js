document.addEventListener('DOMContentLoaded', function () {
  var usernameElement = document.getElementById('username');
  var usernameText = usernameElement.textContent.replace('Welcome ', ''); // Remove "Welcome" text

  if (usernameText.length > 10) {
    var truncatedText = usernameText.slice(0, 7) + '...';
    usernameElement.innerHTML = '<span class="truncated-username">' + truncatedText + '</span>';

    var truncatedUsername = document.querySelector('.truncated-username');
    truncatedUsername.addEventListener('click', function () {
      var modalOverlay = document.createElement('div');
      modalOverlay.className = 'modal-overlay';
      modalOverlay.innerHTML = '<div class="modal-box"><span class="close-modal">×</span><span class="full-username">' + usernameText + '</span></div>';
      document.body.appendChild(modalOverlay);

      var closeModal = document.querySelector('.close-modal');
      closeModal.addEventListener('click', function () {
        modalOverlay.remove();
      });
    });
  }
});
// Loading Screen Instant
// window.addEventListener('load', function() {
//     var loadingScreen = document.getElementById('loading-screen');
//     loadingScreen.style.display = 'none';
// });
// Loading Smooth Unloading
window.addEventListener('load', function () {
  var loadingScreen = document.getElementById('loading-screen');

  setTimeout(function () {
    loadingScreen.style.opacity = '0'; /* Set opacity to 0 for fade-out effect */
    setTimeout(function () {
      loadingScreen.style.display = 'none'; /* Hide the loading screen */
    }, 250); /* Delay for 250ms before hiding */
  }, 250); /* Delay for 250ms before starting fade-out */
});