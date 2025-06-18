document.addEventListener('DOMContentLoaded', function () {
    const imageGrid = document.getElementById('image-history-grid');
    if (!imageGrid) {
        return;
    }

    const userId = imageGrid.dataset.userId;

    window.Echo.private(`user.${userId}`)
        .listen('AnalysisCompleted', (e) => {
            const roomImage = e.roomImage;
            const pendingCard = document.querySelector(`#image-card-${roomImage.id}[data-status="pending"]`);

            if (pendingCard) {
                startAnalysisAnimation(pendingCard, roomImage);
            }
        });
});

function startAnalysisAnimation(card, roomImage) {
    // Find the specific elements within the card that we need to change
    const pendingContainer = card.querySelector('.pending-container');
    const progressBar = card.querySelector('.progress-bar');
    const progressText = card.querySelector('.progress-text');

    // Ensure the pending container is visible before starting
    pendingContainer.classList.remove('hidden');

    let progress = 0;
    const duration = Math.floor(Math.random() * 2000) + 3000; // 3-5 seconds
    const intervalTime = 50; // ms
    const increment = 100 / (duration / intervalTime);

    const animationInterval = setInterval(() => {
        progress += increment;
        if (progress >= 100) {
            progress = 100;
            // Stop the animation FIRST
            clearInterval(animationInterval);
            // THEN update the card content with the final results
            updateCardContent(card, roomImage);
        }
        // Update the visual width of the progress bar and the text
        progressBar.style.width = progress + '%';
        progressText.textContent = `Analyzing... ${Math.round(progress)}%`;
    }, intervalTime);
}

function updateCardContent(card, roomImage) {
    const analysisContent = card.querySelector('.analysis-content');
    const pendingContainer = card.querySelector('.pending-container');

    // Build the final HTML with the results
    const finalHtml = `
        <h5 class="font-semibold text-secondary-800 dark:text-secondary-200">AI Analysis:</h5>
        <div class="mt-1 text-sm text-secondary-700 dark:text-secondary-300 whitespace-pre-wrap">${roomImage.ai_analysis.replace(/\n/g, '<br>')}</div>
        <h5 class="font-semibold mt-4 text-secondary-800 dark:text-secondary-200">Tidiness Score:</h5>
        <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">${roomImage.tidiness_score}/100</p>
    `;

    // Set the final HTML, hide the progress bar container, and mark the card as complete
    analysisContent.innerHTML = finalHtml;
    pendingContainer.classList.add('hidden');
    card.dataset.status = "completed";
}